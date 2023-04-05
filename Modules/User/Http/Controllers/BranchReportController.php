<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Modules\User\Models\Branch;
use Illuminate\Routing\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Contracts\Support\Renderable;
use Modules\VesselInfo\Models\VesselInfo;
use App\Models\Post;
class BranchReportController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
     //search project end
     public function index(Request $request) {
        $output = '';
        $vessel_info = $request->vessel_info;
          $vesselInfo = Branch::where(function ($query) use ($vessel_info){
                                $query->where('name', 'LIKE', '%'. $vessel_info. '%')
                                    ->orWhere('code_name', 'LIKE', '%'. $vessel_info. '%');
                            })
                            ->get(['code_name', 'name', 'id']);
        //    dd($vesselInfo);
          if(!empty($vessel_info)) {
              if(count($vesselInfo) > 0) {
                foreach ($vesselInfo as $vessel) {
                    $output.='<tr>
                        <td>'.$vessel->code_name.'</td>
                        <td>'.$vessel->name.'</td>
                        <td><button type="button" onclick="setDonerInfo(\''.$vessel->code_name.'\', \''.$vessel->name.'\')" class="btn btn-primary btn-sm btn-rounded">Select</button></td>
                        </tr>';
                    }
              }
              else {
                $output.='<tr><td colspan="6" class="text-center"><h2>No Result Found</h2></td></tr>';
            }
        }
        return Response($output);
    }
    // public function index()
    // {
    //     $posts = Post::all();  
    //     dd($posts);
    //     return view('posts.index', compact('posts'));
    // }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
    	$request->validate([
            'title'=>'required',
            'body'=>'required',
        ]);   

        $input = $request->all();
        $input['userId'] = auth()->user()->id;  
        Post::create($input);   
        return redirect()->route('posts.index');
    }

    public function show($id)
    {
    	$post = Post::find($id);
        return view('posts.show', compact('post'));
    }

    

}
