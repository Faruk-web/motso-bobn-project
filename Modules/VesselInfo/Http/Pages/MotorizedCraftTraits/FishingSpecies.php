<?php
namespace Modules\VesselInfo\Http\Pages\MotorizedCraftTraits;
use Modules\VesselInfo\Models\VesselWiseFishingSpeciesInfo;
trait FishingSpecies
{
    //--FISHING SPECIESS--//
    public $fishing_species_id;
    public $primary_species_id;
    public $secondary_species_id;
    public $others_species_id;
    public $type;
    public $entry_by;
    public $update_by;
    public $status;
    public function fishingSpeciesValidation()
    {
        # Validation @request
        $this->validate([
            'fishing_species_id' => ['required', 'string'],
        ]);
    }

    public function fishingSpeciesStore($VesselInfo)
    {
        $user_info= auth()->user();
        $VesselWiseFishingSpeciesInfoPrimary = VesselWiseFishingSpeciesInfo::where('vessel_info_id',$VesselInfo->id)->where('fishing_species_type','P')->firstOrNew();
        $VesselWiseFishingSpeciesInfoPrimary->vessel_info_id = $VesselInfo->id;
        $VesselWiseFishingSpeciesInfoPrimary->fishing_species_type = 'P';
        $VesselWiseFishingSpeciesInfoPrimary->fishing_species_ids = implode(',',$this->primary_species_id);
        $VesselWiseFishingSpeciesInfoPrimary->entry_by = $user_info->id;
        $VesselWiseFishingSpeciesInfoPrimary->status = 'A';
        $VesselWiseFishingSpeciesInfoPrimary->save();

        $VesselWiseFishingSpeciesInfoSecondary = VesselWiseFishingSpeciesInfo::where('vessel_info_id',$VesselInfo->id)->where('fishing_species_type','S')->firstOrNew();
        $VesselWiseFishingSpeciesInfoSecondary->vessel_info_id = $VesselInfo->id;
        $VesselWiseFishingSpeciesInfoSecondary->fishing_species_type = 'S';
        $VesselWiseFishingSpeciesInfoSecondary->fishing_species_ids = implode(',',$this->secondary_species_id);
        $VesselWiseFishingSpeciesInfoSecondary->entry_by = $user_info->id;
        $VesselWiseFishingSpeciesInfoSecondary->status = 'A';
        $VesselWiseFishingSpeciesInfoSecondary->save();

        $VesselWiseFishingSpeciesInfoOther = VesselWiseFishingSpeciesInfo::where('vessel_info_id',$VesselInfo->id)->where('fishing_species_type','O')->firstOrNew();
        $VesselWiseFishingSpeciesInfoOther->vessel_info_id = $VesselInfo->id;
        $VesselWiseFishingSpeciesInfoOther->fishing_species_type = 'O';
        $VesselWiseFishingSpeciesInfoOther->fishing_species_ids = implode(',',$this->others_species_id);
        $VesselWiseFishingSpeciesInfoOther->entry_by = $user_info->id;
        $VesselWiseFishingSpeciesInfoOther->status = 'A';
        $VesselWiseFishingSpeciesInfoOther->save();
    }

    public function fishingSpeciesEdit($VesselInfo)
    {
        $VesselWiseFishingSpeciesInfoPrimary = VesselWiseFishingSpeciesInfo::where('vessel_info_id',$VesselInfo->id)->where('fishing_species_type','P')->first();
        $this->primary_species_id = $VesselWiseFishingSpeciesInfoPrimary && $VesselWiseFishingSpeciesInfoPrimary->fishing_species_ids ? explode(',',$VesselWiseFishingSpeciesInfoPrimary->fishing_species_ids) : null;

        $VesselWiseFishingSpeciesInfoSecondary = VesselWiseFishingSpeciesInfo::where('vessel_info_id',$VesselInfo->id)->where('fishing_species_type','S')->first();
        $this->secondary_species_id = $VesselWiseFishingSpeciesInfoSecondary && $VesselWiseFishingSpeciesInfoSecondary->fishing_species_ids ? explode(',',$VesselWiseFishingSpeciesInfoSecondary->fishing_species_ids) : null ;

        $VesselWiseFishingSpeciesInfoOther = VesselWiseFishingSpeciesInfo::where('vessel_info_id',$VesselInfo->id)->where('fishing_species_type','O')->first();
        $this->others_species_id = $VesselWiseFishingSpeciesInfoOther && $VesselWiseFishingSpeciesInfoOther->fishing_species_ids ? explode(',', $VesselWiseFishingSpeciesInfoOther->fishing_species_ids) : null;
    }
}
