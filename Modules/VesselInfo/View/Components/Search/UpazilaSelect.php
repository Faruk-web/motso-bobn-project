<?php

namespace Modules\VesselInfo\View\Components\Search;

use Modules\User\Models\Upazila;
use Illuminate\View\Component;

class UpazilaSelect extends Component
{
    public $name;
    public $show_name;

    public function __construct()
    {
        //
    }

    public function render()
    {
        $AreaStatus = Upazila::orderBy('name', 'asc')->get();

        return view('vesselinfo::components.search.upazilaselect',[
            'AreaStatus' => $AreaStatus
        ]);
    }
}
