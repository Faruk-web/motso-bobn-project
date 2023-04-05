<?php

namespace Modules\VesselInfo\Http\Pages;

use Modules\VesselInfo\Http\Pages\MotorizedCraftTraits\GearSurvey;
use Modules\VesselInfo\Http\Pages\MotorizedCraftTraits\LegalStatus;
use Modules\VesselInfo\Http\Pages\MotorizedCraftTraits\VesselOwnership;
use Modules\VesselInfo\Http\Pages\MotorizedCraftTraits\VesselDescription;
use Modules\VesselInfo\Http\Pages\MotorizedCraftTraits\FishingSpecies;
use Modules\VesselInfo\Http\Pages\MotorizedCraftTraits\Gear;
use Modules\VesselInfo\Http\Pages\MotorizedCraftTraits\Equipment;
use Modules\VesselInfo\Http\Pages\MotorizedCraftTraits\CrewStaff;
use Modules\VesselInfo\Http\Pages\MotorizedCraftTraits\TripInformation;
use Modules\User\Models\User;
use Illuminate\Support\Facades\Auth;
use Modules\Core\Http\Common\Component;
use Modules\VesselInfo\Models\VesselInfo;
use Modules\VesselInfo\Models\VesselWiseFishingAreaInfo;
use Modules\VesselInfo\Models\Image;

class MotorizedCraft extends Component
{
    use GearSurvey;
    use LegalStatus;
    use VesselOwnership;
    use VesselDescription;
    use FishingSpecies;
    use Gear;
    use Equipment;
    use CrewStaff;
    use TripInformation;
    
    public $entry_by;
    public $update_by;
    public $submitted_by;
    public $is_archive;
    public $validation_status;
    public $tabCount = 1;
    protected $queryString = ['tabCount'];
    public $vessel_info_id;
    public $legal_action;
    public $complain_action;
    public $pinishment;
    public $division_code;
    public $upazilla_id;

    public function tabChange($tab = null)
    {
        if ($tab) {
            $this->tabCount = $tab;
        } else {
            $this->tabCount = 1;
        }
    }

    public function previousStore()
    {
        $this->tabCount--;
    }

    public function nextStore()
    {
        $this->motorizedCraftStore();
    }

    public function finalStore()
    {
        $user_info= auth()->user();
        $total_vessel = VesselInfo::count('id');
        $update_count = $total_vessel + 1;
        $vessel_code = "2023".rand(1000, 9999).$update_count;
        $VesselInfo = VesselInfo::findOrNew($this->vessel_info_id);
        $VesselInfo->provisional_vessel_id  = $vessel_code;
        $VesselInfo->entry_by = $user_info->id;
        $VesselInfo->update_by = $user_info->id;
        $VesselInfo->submitted_by = $user_info->id;
        $VesselInfo->validation_status = 'PD';
        $VesselInfo->status = 2;
       // -----------------------only finished button------------------------
        $VesselInfo->legal_action = $this->legal_action;
        $VesselInfo->pinishment = $this->pinishment;
        // $VesselWiseFishingAreaInfo = VesselWiseFishingAreaInfo::where('vessel_info_id',$VesselInfo->id)->firstOrNew();
        // $VesselWiseFishingAreaInfo->vessel_info_id = $VesselInfo->id;
        // $VesselWiseFishingAreaInfo->fishing_area_ids = implode(',',$this->fishing_area_ids);
        // $VesselWiseFishingAreaInfo->entry_by = $user_info->id;
        // $VesselWiseFishingAreaInfo->status = 'A';
        // $VesselWiseFishingAreaInfo->save();
        // $VesselInfo->trip_duration = $this->trip_duration;
        // $VesselInfo->trips_per_year = $this->trips_per_year;
        // $VesselInfo->fishing_days_per_year = $this->fishing_days_per_year;
        // $VesselInfo->avg_cost_per_trip = $this->avg_cost_per_trip;
        // $VesselInfo->min_fishing_depth = $this->min_fishing_depth;
        // $VesselInfo->max_fishing_depth = $this->max_fishing_depth;
        // $VesselInfo->home_port_id = $this->home_port_id;
        // $VesselInfo->landing_port_id = $this->landing_port_id;
        // $VesselInfo->other_fishing_area_descrip = $this->other_fishing_area_descrip;
     // -----------------------only finished button------------------------
        $VesselInfo->save();
        $this->reset();
        $this->dispatchBrowserEvent('typeahead_reset');
    }

    public function motorizedCraftStore()
    {
        $VesselInfo = VesselInfo::findOrNew($this->vessel_info_id);

        // if($this->tabCount == 1){
        //     $this->gearSurveyValidation();
        // }elseif($this->tabCount == 2){
        //     $this->legalStatusValidation();
        // }

        try {
            if ($this->tabCount == 1) {
                if (!$this->vessel_info_id) {
                    $User = Auth::user();
                    $VesselInfo->user_id = $User->id;
                    $VesselInfo->branch_id = $User->branch_id ?? null;
                }
                $VesselInfo = $this->gearSurveyStore($VesselInfo);
                $this->vessel_info_id = $VesselInfo->id;
                $this->tabCount = 2;
            } elseif ($this->tabCount == 2) {
                $this->legalStatusStore($VesselInfo);
                $this->tabCount = 3;
            } elseif ($this->tabCount == 3) {
                $this->vesselOwnershipStore($VesselInfo);
                $this->tabCount = 4;
            } elseif ($this->tabCount == 4) {
                $this->vesselDescriptionStore($VesselInfo);
                $this->tabCount = 5;
            } elseif ($this->tabCount == 5) {
                $this->fishingSpeciesStore($VesselInfo);
                $this->tabCount = 6;
            } elseif ($this->tabCount == 6) {
                $this->gearStore($VesselInfo);
                $this->tabCount = 7;
            } elseif ($this->tabCount == 7) {
                $this->equipmentStore($VesselInfo);
                $this->tabCount = 8;
            } elseif ($this->tabCount == 8) {
                $this->crewStaffStore($VesselInfo);
                $this->tabCount = 9;
            } elseif ($this->tabCount == 9) {
                $this->tripInformationStore($VesselInfo);
                $this->tabCount = 10;
            }
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    

    public function updatedTripDuration()
    {
        $this->calculateTotalSkiper();
    }

    public function updatedTripsPerYearrrr()
    {
        $this->calculateTotalSkiper();
    }
    public function updatedTripsPerYearr()
    {
        $this->calculateTotalSkiper();
    }
    public function updatedTripsPerYearrr()
    {
        $this->calculateTotalSkiper();
    }
    public function calculateTotalSkiper()
    {
        if ($this->number_of_skipper_majhi && $this->number_of_engine_crew && $this->number_of_fishers_deckhand && $this->trip_duration) {
            $this->total_crew = $this->number_of_skipper_majhi + $this->number_of_engine_crew + $this->number_of_fishers_deckhand + $this->trip_duration;
        }
    }

    

    public function mount($id = null)
    {
        $User = Auth::user();
        $this->old_vessel_index_id = $User->user_code;
        $users = User::with('Branch.division','Branch.upazila')->find($User->id);
        $this->division_code = $users->Branch->division->id;
        // dd($this->division_code);
        $this->upazilla_id = $users->Branch->upazila->id;
        if ($id) {
            $this->vessel_info_id = $id;
            $VesselInfo = VesselInfo::findOrfail($this->vessel_info_id);
            $this->gearSurveyEdit($VesselInfo);
            $this->legalStatusEdit($VesselInfo);
            $this->vesselOwnershipEdit($VesselInfo);
            $this->vesselDescriptionEdit($VesselInfo);
            $this->fishingSpeciesEdit($VesselInfo);
            $this->gearEdit($VesselInfo);
            $this->equipmentEdit($VesselInfo);
            $this->crewStaffEdit($VesselInfo);
            $this->tripInformationEdit($VesselInfo);
        }
    }


    public function render()
    {
        return view('vesselinfo::pages.motorized-craft')->layout('template::layouts.backend');
    }
}
