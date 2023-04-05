<?php
namespace Modules\VesselInfo\Http\Pages\MotorizedCraftTraits;
trait CrewStaff
{
    //--CREW/STAFF--//
    public $skipper_name;
    public $skipper_nid;
    public $number_of_skipper_majhi;
    public $number_of_engine_crew;
    public $number_of_fishers_deckhand;
    public $number_of_other_crew;
    public $total_crew;
    public $skipper_fid;
    public $skipper_mobile_no;
    public $status;
    public $trip_duration;
    
    public function crewStaffValidation()
    {
        # Validation @request
        $this->validate([
            'skipper_name' => ['required', 'string'],
            'skipper_nid' => ['required', 'string'],
            'number_of_skipper_majhi' => ['required', 'string'],
            'number_of_engine_crew' => ['required', 'string'],
            'number_of_fishers_deckhand' => ['required', 'string'],
            'number_of_other_crew' => ['required', 'string'],
        ]);

    }

    public function crewStaffStore($VesselInfo)
    {
        $VesselInfo->skipper_name = $this->skipper_name;
        $VesselInfo->skipper_nid = $this->skipper_nid;
        $VesselInfo->skipper_fid = $this->skipper_fid;
        $VesselInfo->skipper_mobile_no = $this->skipper_mobile_no;
        $VesselInfo->number_of_skipper_majhi = $this->number_of_skipper_majhi;
        $VesselInfo->number_of_engine_crew = $this->number_of_engine_crew;
        $VesselInfo->number_of_fishers_deckhand = $this->number_of_fishers_deckhand;
        $VesselInfo->number_of_other_crew = $this->trip_duration;
        $VesselInfo->total_crew = $this->total_crew;
        $VesselInfo->status = '2';
        $VesselInfo->save();
    }

    public function crewStaffEdit($VesselInfo)
    {
        $this->skipper_name = $VesselInfo->skipper_name;
        $this->skipper_nid = $VesselInfo->skipper_nid;
        $this->skipper_fid = $VesselInfo->skipper_fid;
        $this->skipper_mobile_no = $VesselInfo->skipper_mobile_no;
        $this->number_of_skipper_majhi = $VesselInfo->number_of_skipper_majhi;
        $this->number_of_engine_crew = $VesselInfo->number_of_engine_crew;
        $this->number_of_fishers_deckhand = $VesselInfo->number_of_fishers_deckhand;
        $this->trip_duration = $VesselInfo->number_of_other_crew;
        $this->total_crew = $VesselInfo->total_crew;
    }
}
