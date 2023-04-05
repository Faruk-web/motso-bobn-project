<?php

namespace Modules\VesselInfo\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Modules\VesselInfo\Models\VesselInfo;
use Illuminate\Routing\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Contracts\Support\Renderable;

class DatatableController extends Controller
{
 
    public function index(Request $request)
    {
        switch ($request->table) {
            case 'vesselInfoListDatatable': return $this->vesselInfoListDatatable($request);
                break;

            default:
                return DataTables::of([])->toJson();
                break;
        }
    }

    private function vesselInfoListDatatable($request)
    {
        $id = auth()->user()->id;
        $Data = VesselInfo::query()->where('status','1')->where('user_id',$id)->select('id','vessel_name','mmo_registration_no','date_issued','fishing_license_no','fishing_permit');

       return DataTables::of($Data)
        ->addColumn('created_at', function ($data) {
            return now()->parse($data->created_at)->format(getTimeFormat());
        })
        ->addColumn('status', function ($data) {
            // return $data->status ? config('status.common.'.$data->status.'.name') : '';
            $html = '';
            $html .= '<p class="text-warning btn-sm call callEvent">Approved</p>';
           return $html;
        })
        // ->addColumn('action', function ($data) {
        //     $html = '';
        //     $html .= '<a href="javascript:void(0)" class="btn btn-warning fa fa-edit btn-sm call callEvent" data-listener="openBranchModal" data-id="'.$data->id.'">Edit</a>';
        //    return $html;
        // })
        ->rawColumns(['status'])
        ->toJson();
    }

     //search project end
     public function search_VesselInfo(Request $request) {
        $output = '';
        $vessel_info = $request->vessel_info;
          $vesselInfo = VesselInfo::where(function ($query) use ($vessel_info){
                                $query->where('vessel_name', 'LIKE', '%'. $vessel_info. '%')
                                    ->orWhere('date_issued', 'LIKE', '%'. $vessel_info. '%');
                            })
                            ->get(['date_issued', 'vessel_name', 'id']);
           dd($vesselInfo);
          if(!empty($vessel_info)) {
              if(count($vesselInfo) > 0) {
                foreach ($vesselInfo as $vessel) {
                    $output.='<tr>
                        <td>'.$vessel->date_issued.'</td>
                        <td>'.$vessel->vessel_name.'</td>
                        <td><button type="button" onclick="setDonerInfo(\''.$vessel->date_issued.'\', \''.$vessel->vessel_name.'\')" class="btn btn-primary btn-sm btn-rounded">Select</button></td>
                        </tr>';
                    }
              }
              else {
                $output.='<tr><td colspan="6" class="text-center"><h2>No Result Found</h2></td></tr>';
            }
        }
        return Response($output);
    }

}
