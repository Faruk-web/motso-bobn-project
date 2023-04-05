<?php

namespace Modules\VesselInfo\View\Components\Search;

use Modules\VesselInfo\Models\VesselSetupInfo;
use Illuminate\View\Component;

class VesselSetup extends Component
{
    public $type;
    public $show_type;

    public function __construct($type = null,$show = 'vessel_name')
    {
        $this->type = $type;
        $this->show_type = $show;
    }

    public function render()
    {
        $VesselSetupStatus = VesselSetupInfo::active();
       

        if($this->type){
            $VesselSetupStatus->whereType($this->type)->orderBy('name', 'asc');
        }

        return view('vesselinfo::components.search.vesselsetup',[
            'VesselSetupStatus' => $VesselSetupStatus->get(),
            'show_type' =>  $this->show_type
        ]);
    }
}
