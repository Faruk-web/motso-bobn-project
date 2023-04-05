<?php

namespace Modules\VesselInfo\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\VesselInfo\Models\VesselInfo;
use DB;
class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    
        public function index()
        {
            $results = VesselInfo::paginate();
            return view('vesselinfo::pages.search.search', compact('results'));
        }
        public function simple(Request $request)
        {
            $results  = DB::table('vessel_infos');
            if ($request->input('search')) {
                $query->where('name', 'LIKE', '%' . $request->input('search') . '%');
            }
             
            $results = $query->paginate();
            return view('vesselinfo::pages.search.search', compact('results'));
        }
        public function advance(Request $request)
        {
            // $query  = DB::table('vessel_infos');
            $query = VesselInfo::with('VesselSetupInfo');
            dd($query);
            if ($request->input('name')) {
                $query->where('name', 'LIKE', '%' . $request->input('name') . '%');
            }
            if ($request->input('skipper_name')) {
                $query->where('VesselSetupInfo.name', $request->input('skipper_name'));
            }
            if ($request->input('start_date')) {
                $query->where('created_at', '>=', $request->input('start_date'));
            }
        
            if ($request->input('end_date')) {
                $query->where('created_at', '<=', $request->input('end_date'));
            }
        
            if ($request->input('yearly')) {
                $query->whereYear('created_at', $request->input('yearly'));
            }
        
            if ($request->input('skipper_name')) {
                $query->where('skipper_name', 'LIKE', '%' . $request->input('skipper_name') . '%');
            }
        
            $results = $query->paginate();
            return view('vesselinfo::pages.search.search',compact('results'));
        }
    
    // public function index()
    // {
    //     return view('vesselinfo::pages.search.search');
    // }

    /**
     * Show the form for creating a new resource. 
     * @return Renderable
     */
    public function create()
    {
        return view('vesselinfo::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('vesselinfo::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('vesselinfo::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
