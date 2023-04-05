<?php

namespace Modules\VesselInfo\Http\Pages;
use Modules\VesselInfo\Models\VesselInfo;
use Modules\VesselInfo\Models\PortInfo;
use Illuminate\Support\Facades\Auth;
use Modules\Core\Http\Common\Component;

class VesselReportPdf extends Component
{
    public function render()
    {
        $vesselInfo=VesselInfo::with('User')->get();
        return view('vesselinfo::pages.vessel-report-pdf',compact('vesselInfo'))->layout('template::layouts.backend');
    }
}
