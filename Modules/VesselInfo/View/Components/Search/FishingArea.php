<?php

namespace Modules\VesselInfo\View\Components\Search;

use Modules\VesselInfo\Models\FishingAreaInfo;
use Illuminate\View\Component;

class FishingArea extends Component
{
    public $name;
    public $show_name;

    public function __construct()
    {
        //
    }

    public function render()
    {
        $AreaStatus = FishingAreaInfo::orderBy('name', 'asc')->get();

        return view('vesselinfo::components.search.fishingarea',[
            'AreaStatus' => $AreaStatus
        ]);
    }
}