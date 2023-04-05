<?php

namespace Modules\VesselInfo\View\Components\Search;

use Modules\VesselInfo\Models\FishingSpeciesInfo;
use Illuminate\View\Component;

class FishingSpecies extends Component
{
    public $name;
    public $show_name;

    public function __construct()
    {
        //
    }

    public function render()
    {
        return view('vesselinfo::components.search.fishingspecies',[
            'FishingSpeciesStatus' => FishingSpeciesInfo::orderBy('name', 'asc')->get()
        ]);
    }
}
