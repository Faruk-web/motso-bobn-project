<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Modules\User\Models\Branch;
use Illuminate\Routing\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Contracts\Support\Renderable;

class DatatableController extends Controller
{
    public function index(Request $request)
    {
        switch ($request->table) {
            case 'branchDatatable': return $this->branchDatatable($request);
                break;

            default:
                return DataTables::of([])->toJson();
                break;
        }
    }

    private function branchDatatable($request)
    {
        $Data = Branch::query()->select('id', 'name', 'phone_no', 'address', 'status', 'created_at');
       return DataTables::of($Data)
        ->addColumn('created_at', function ($data) {
            return now()->parse($data->created_at)->format(getTimeFormat());
        })
        ->addColumn('status', function ($data) {
            return $data->status ? config('status.common.'.$data->status.'.name') : '';
        })
        ->addColumn('action', function ($data) {
            $html = '';
            $html .= '<a href="javascript:void(0)" class="btn btn-success btn-sm call callEvent" data-listener="openBranchModal" data-id="'.$data->id.'">Edit</a>';
            $html .= '<a href="javascript:void(0)" class="btn btn-danger btn-sm call callEvent" data-listener="branchDelete" data-id="'.$data->id.'">Delete</a>';
           return $html;
        })
        ->rawColumns(['status','action'])
        ->toJson();
    }

}
