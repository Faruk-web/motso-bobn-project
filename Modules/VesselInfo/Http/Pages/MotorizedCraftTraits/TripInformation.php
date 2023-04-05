<?php
namespace Modules\VesselInfo\Http\Pages\MotorizedCraftTraits;
use Modules\VesselInfo\Models\VesselWiseFishingAreaInfo;
trait TripInformation
{
     //--TRIP INFORMATION--//
     public $trip_duration;
     public $trips_per_year;
     public $fishing_days_per_year;
     public $avg_cost_per_trip;
     public $min_fishing_depth;
     public $max_fishing_depth;
     public $home_port_id;
     public $landing_port_id;
     public $fishing_area_ids;
     public $status;
     public $entry_by;
     public $update_by;
     public $other_fishing_area;
     public $other_fishing_area_descrip;
    public function tripInformationValidation()
    {
        # Validation @request
        $this->validate([
            'trip_duration' => ['required', 'integer'],
            'trips_per_year' => ['required', 'integer'],
            'fishing_days_per_year' => ['required', 'integer'],
            'avg_cost_per_trip' => ['required', 'string'],
            'min_fishing_depth' => ['required', 'string'],
            'max_fishing_depth' => ['required', 'string'],
            'home_port_id' => ['required', 'integer'],
            'landing_port_id' => ['required', 'integer'],
            // 'fishing_area_id' => ['required', 'integer'],
        ]);

    }
    public function updatedTripDuration()
    {
        $this->calculateDayAndYear();
    }

    public function updatedTripsPerYear()
    {
        $this->calculateDayAndYear();
    }


    public function calculateDayAndYear()
    {
        if ($this->trip_duration && $this->trips_per_year) {
            $this->fishing_days_per_year = $this->trip_duration * $this->trips_per_year;
        }
    }

    public function tripInformationStore($VesselInfo)
    {
        $user_info= auth()->user();
        $VesselWiseFishingAreaInfo = VesselWiseFishingAreaInfo::where('vessel_info_id',$VesselInfo->id)->firstOrNew();
        $VesselWiseFishingAreaInfo->vessel_info_id = $VesselInfo->id;
        $VesselWiseFishingAreaInfo->fishing_area_ids = implode(',',$this->fishing_area_ids);
        $VesselWiseFishingAreaInfo->entry_by = $user_info->id;
        $VesselWiseFishingAreaInfo->status = 'A';
        $VesselWiseFishingAreaInfo->save();
        $VesselInfo->trip_duration = $this->trip_duration;
        $VesselInfo->trips_per_year = $this->trips_per_year;
        $VesselInfo->fishing_days_per_year = $this->fishing_days_per_year;
        $VesselInfo->avg_cost_per_trip = $this->avg_cost_per_trip;
        $VesselInfo->min_fishing_depth = $this->min_fishing_depth;
        $VesselInfo->max_fishing_depth = $this->max_fishing_depth;
        $VesselInfo->home_port_id = $this->home_port_id;
        $VesselInfo->landing_port_id = $this->landing_port_id;
        $VesselInfo->other_fishing_area_descrip = $this->other_fishing_area_descrip;
        $VesselInfo->status = 2;
        $VesselInfo->save();
    }

    public function tripInformationEdit($VesselInfo)
    {
        $user_info= auth()->user();
        $VesselWiseFishingAreaInfo = VesselWiseFishingAreaInfo::where('vessel_info_id',$VesselInfo->id)->firstOrNew();
        $this->fishing_area_ids = explode(',',$VesselWiseFishingAreaInfo->fishing_area_ids);

        $this->trip_duration = $VesselInfo->trip_duration;
        $this->trips_per_year = $VesselInfo->trips_per_year;
        $this->fishing_days_per_year = $VesselInfo->fishing_days_per_year;
        $this->avg_cost_per_trip = $VesselInfo->avg_cost_per_trip;
        $this->min_fishing_depth = $VesselInfo->min_fishing_depth;
        $this->max_fishing_depth = $VesselInfo->max_fishing_depth;
        $this->home_port_id = $VesselInfo->home_port_id;
        $this->landing_port_id = $VesselInfo->landing_port_id;
        $this->update_by = $user_info->id;
        $this->status =2;
        $this->other_fishing_area_descrip = $VesselInfo->other_fishing_area_descrip;
    }
}
