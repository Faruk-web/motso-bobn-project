<?php

namespace Modules\VesselInfo\View\Components\Search;

use Modules\User\Models\Division;
use Illuminate\View\Component;

class DivisionSelect extends Component
{
    public $name;
    public $show_name;

    public function __construct()
    {
        //
    }

    public function render()
    {
        $AreaStatus = Division::orderBy('name', 'asc')->get();

        return view('vesselinfo::components.search.divisionselect',[
            'AreaStatus' => $AreaStatus
        ]);
    }
}
