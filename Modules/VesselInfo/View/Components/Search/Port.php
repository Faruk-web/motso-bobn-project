<?php

namespace Modules\VesselInfo\View\Components\Search;

use Modules\VesselInfo\Models\PortInfo;
use Illuminate\View\Component;

class Port extends Component
{
    public $name;
    public $show_name;

    public function __construct()
    {
        //
    }

    public function render()
    {
        $PortStatus = PortInfo::orderBy('name', 'asc')->get();

        return view('vesselinfo::components.search.portinfo',[
            'PortStatus' => $PortStatus
        ]);
    }
}
