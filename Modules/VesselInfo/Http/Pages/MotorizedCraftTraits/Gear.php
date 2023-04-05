<?php
namespace Modules\VesselInfo\Http\Pages\MotorizedCraftTraits;
use Modules\VesselInfo\Models\VesselWiseGearInfo;
trait Gear
{
    //--GEAR--//
    public $gear_id;
    public $other_gear_id;
    public $gear_count;
    public $avg_gear_length;
    public $avg_gear_width;
    public $mesh_size;
    public $number_of_hook_per_line;
    public $filament_id;
    public $other_gear_status;
    public $other_gear_name;
    public $other_gear_count;
    public $other_avg_gear_length;
    public $other_avg_gear_width;
    public $other_mesh_size;
    public $other_number_of_hook_per_line;
    public $entry_by;
    public $update_by;
    
    public function gearValidation()
    {
        # Validation @request
        $this->validate([
            'gear_id' => ['required', 'integer'],
            'gear_count' => ['required', 'string'],
            'avg_gear_length' => ['required', 'string'],
            'avg_gear_width' => ['required', 'string'],
            'mesh_size' => ['required', 'string'],
            'number_of_hook_per_line' => ['required', 'string'],
            'filament_id' => ['required', 'integer'],
        ]);

    }

    public function gearStore($VesselInfo)
    {
        $user_info= auth()->user();
        $VesselWiseGearInfo = VesselWiseGearInfo::where('vessel_info_id',$VesselInfo->id)->firstOrNew();
        $VesselWiseGearInfo->vessel_info_id = $VesselInfo->id;
        $VesselWiseGearInfo->gear_id = $this->gear_id;
        $VesselWiseGearInfo->gear_count = $this->gear_count;
        $VesselWiseGearInfo->avg_gear_length = $this->avg_gear_length;
        $VesselWiseGearInfo->avg_gear_width = $this->avg_gear_width;
        $VesselWiseGearInfo->mesh_size = $this->mesh_size;
        $VesselWiseGearInfo->number_of_hook_per_line = $this->number_of_hook_per_line;
        $VesselWiseGearInfo->filament_id = $this->filament_id;
        $VesselWiseGearInfo->entry_by = $user_info->id;
        $VesselWiseGearInfo->other_gear_status = $this->other_gear_status;
        $VesselWiseGearInfo->other_gear_name = $this->other_gear_name;
        $VesselWiseGearInfo->other_gear_count = $this->other_gear_count;
        $VesselWiseGearInfo->other_avg_gear_length = $this->other_avg_gear_length;
        $VesselWiseGearInfo->other_avg_gear_width = $this->other_avg_gear_width;
        $VesselWiseGearInfo->other_mesh_size = $this->other_mesh_size;
        $VesselWiseGearInfo->other_number_of_hook_per_line = $this->other_number_of_hook_per_line;
        $VesselWiseGearInfo->save();
    }

    public function gearEdit($VesselInfo)
    {
        $user_info= auth()->user();
        $VesselWiseGearInfo = VesselWiseGearInfo::where('vessel_info_id',$VesselInfo->id)->first();
        if($VesselWiseGearInfo){
            $this->gear_id = $VesselWiseGearInfo->gear_id;
            $this->gear_count = $VesselWiseGearInfo->gear_count;
            $this->avg_gear_length = $VesselWiseGearInfo->avg_gear_length;
            $this->avg_gear_width = $VesselWiseGearInfo->avg_gear_width;
            $this->mesh_size = $VesselWiseGearInfo->mesh_size;
            $this->number_of_hook_per_line = $VesselWiseGearInfo->number_of_hook_per_line;
            $this->filament_id = $VesselWiseGearInfo->filament_id;
            $this->update_by = $user_info->id;
            $this->other_gear_status = $VesselWiseGearInfo->other_gear_status;
            $this->other_gear_name = $VesselWiseGearInfo->other_gear_name;
            $this->other_gear_count = $VesselWiseGearInfo->other_gear_count;
            $this->other_avg_gear_length = $VesselWiseGearInfo->other_avg_gear_length;
            $this->other_avg_gear_width = $VesselWiseGearInfo->other_avg_gear_width;
            $this->other_mesh_size = $VesselWiseGearInfo->other_mesh_size;
            $this->other_number_of_hook_per_line = $VesselWiseGearInfo->other_number_of_hook_per_line;
        }
    }
}
