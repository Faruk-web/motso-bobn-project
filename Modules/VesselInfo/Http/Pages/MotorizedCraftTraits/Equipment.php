<?php
namespace Modules\VesselInfo\Http\Pages\MotorizedCraftTraits;
use Modules\VesselInfo\Models\VesselWiseEquipmentInfo;
trait Equipment
{
    public $other_equipment;
     //--EQUIPMENT--//
     public $nav_equipment_id;
     public $life_equipment_id;
     public $com_equipment_id;
     public $fir_equipment_id;
     public $entry_by;
     public $status;
     public $update_by;
    public function equipmentValidation()
    {
        # Validation @request
        $this->validate([
            // 'nav_equipment_id' => ['required', 'integer'],
        ]);

    }

    public function equipmentStore($VesselInfo)
    {
        $user_info= auth()->user();
        $VesselWiseNavEquipmentInfo = VesselWiseEquipmentInfo::where('vessel_info_id',$VesselInfo->id)->where('type', 'neq')->firstOrNew();
        $VesselWiseNavEquipmentInfo->vessel_info_id = $VesselInfo->id;
        $VesselWiseNavEquipmentInfo->type = 'neq';
        $VesselWiseNavEquipmentInfo->equipment_ids = implode(',',$this->nav_equipment_id);
        $VesselWiseNavEquipmentInfo->entry_by = $user_info->id;
        $VesselWiseNavEquipmentInfo->status = 'A';
        $VesselWiseNavEquipmentInfo->save();


        $VesselWiseLifeEquipmentInfo = VesselWiseEquipmentInfo::where('vessel_info_id',$VesselInfo->id)->where('type', 'lse')->firstOrNew();
        $VesselWiseLifeEquipmentInfo->vessel_info_id = $VesselInfo->id;
        $VesselWiseLifeEquipmentInfo->type = 'lse';
        $VesselWiseLifeEquipmentInfo->equipment_ids = implode(',',$this->life_equipment_id);
        $VesselWiseLifeEquipmentInfo->entry_by = $user_info->id;
        $VesselWiseLifeEquipmentInfo->status = 'A';
        $VesselWiseLifeEquipmentInfo->save();
        
        $VesselWiseComEquipmentInfo = VesselWiseEquipmentInfo::where('vessel_info_id',$VesselInfo->id)->where('type', 'ceq')->firstOrNew();
        $VesselWiseComEquipmentInfo->vessel_info_id = $VesselInfo->id;
        $VesselWiseComEquipmentInfo->type = 'ceq';
        $VesselWiseComEquipmentInfo->equipment_ids = implode(',',$this->com_equipment_id);
        $VesselWiseComEquipmentInfo->entry_by = $user_info->id;
        $VesselWiseComEquipmentInfo->status = 'A';
        $VesselWiseComEquipmentInfo->save();

        $VesselWiseFirEquipmentInfo = VesselWiseEquipmentInfo::where('vessel_info_id',$VesselInfo->id)->where('type', 'fse')->firstOrNew();
        $VesselWiseFirEquipmentInfo->vessel_info_id = $VesselInfo->id;
        $VesselWiseFirEquipmentInfo->type = 'fse';
        $VesselWiseFirEquipmentInfo->equipment_ids = implode(',',$this->fir_equipment_id);
        $VesselWiseFirEquipmentInfo->entry_by = $user_info->id;
        $VesselWiseFirEquipmentInfo->status = 'A';
        $VesselWiseFirEquipmentInfo->save();

        $VesselWiseFirEquipmentInfo = VesselWiseEquipmentInfo::where('vessel_info_id',$VesselInfo->id)->firstOrNew();
        $VesselWiseFirEquipmentInfo->vessel_info_id = $VesselInfo->id;
        $VesselWiseFirEquipmentInfo->type = 'fse';
        $VesselWiseFirEquipmentInfo->other_equipment = $this->other_equipment;
        $VesselWiseFirEquipmentInfo->entry_by = $user_info->id;
        $VesselWiseFirEquipmentInfo->status = 'A';
        $VesselWiseFirEquipmentInfo->save();

    }

    public function equipmentEdit($VesselInfo)
    {
        $VesselWiseNavEquipmentInfo = VesselWiseEquipmentInfo::where('vessel_info_id',$VesselInfo->id)->where('type', 'neq')->first();
        $this->nav_equipment_id = $VesselWiseNavEquipmentInfo && $VesselWiseNavEquipmentInfo->equipment_ids ? explode(',',$VesselWiseNavEquipmentInfo->equipment_ids) : null;
        
        $VesselWiseLifeEquipmentInfo = VesselWiseEquipmentInfo::where('vessel_info_id',$VesselInfo->id)->where('type', 'lse')->first();
        $this->life_equipment_id = $VesselWiseLifeEquipmentInfo && $VesselWiseLifeEquipmentInfo->equipment_ids ? explode(',',$VesselWiseLifeEquipmentInfo->equipment_ids) : null;

        $VesselWiseComEquipmentInfo = VesselWiseEquipmentInfo::where('vessel_info_id',$VesselInfo->id)->where('type', 'ceq')->first();
        $this->com_equipment_id = $VesselWiseComEquipmentInfo && $VesselWiseComEquipmentInfo->equipment_ids ? explode(',',$VesselWiseComEquipmentInfo->equipment_ids) : null;

        $VesselWiseFirEquipmentInfo = VesselWiseEquipmentInfo::where('vessel_info_id',$VesselInfo->id)->where('type', 'fse')->first();
        $this->fir_equipment_id = $VesselWiseFirEquipmentInfo && $VesselWiseFirEquipmentInfo->equipment_ids ? explode(',',$VesselWiseFirEquipmentInfo->equipment_ids) : null;

        $VesselWiseFirEquipmentInfo = VesselWiseEquipmentInfo::where('vessel_info_id',$VesselInfo->id)->first();
        $this->other_equipment = $VesselWiseFirEquipmentInfo && $VesselWiseFirEquipmentInfo->other_equipment ? explode(',',$VesselWiseFirEquipmentInfo->other_equipment) : null;
       
    }
}
