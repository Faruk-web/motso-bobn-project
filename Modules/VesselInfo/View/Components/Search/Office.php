<?php

namespace Modules\VesselInfo\View\Components\Search;

use Modules\User\Models\Branch;
use Illuminate\View\Component;

class Office extends Component
{
    public $name;
    public $show_name;

    public function __construct()
    {
        //
    }

    public function render()
    {
        $PortStatus = Branch::orderBy('name', 'asc')->get();

        return view('vesselinfo::components.search.office',[
            'PortStatus' => $PortStatus
        ]);
    }
}
