<?php

namespace Modules\VesselInfo\Http\Pages\MotorizedCraftTraits;

use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Modules\VesselInfo\Models\Image;

trait VesselDescription
{
    use WithFileUploads;
   //--VESSEL DESCRIPTION--//
   public $year_built;
   public $place_built;
   public $type_of_vessel_id;
   public $vessel_condition_id;
   public $hull_material_id;
   public $color_id;
   public $length_of_vessel;
   public $width_of_vessel;
   public $depth_of_vessel;
   public $gross_tonnage;
   public $net_tonnage;
   public $other_multi_color_desc;
   public $fish_hold_capacity;
   public $engine_no;
   public $make_or_model;
   public $engine_power;
   public $onboard_mobile_number;
   public $vessel_image_id;
   public $vessel_image_prev;

    public function vesselDescriptionValidation()
    {
        # Validation @request
        $this->validate([
            'year_built' => ['required', 'string'],
            'place_built' => ['required', 'string'],
            'type_of_vessel_id' => ['required', 'integer'],
            'vessel_condition_id' => ['required', 'integer'],
            'hull_material_id' => ['required', 'integer'],
            'color_id' => ['required', 'integer'],
            'vessel_image_id' => ['required', 'integer'],
            'length_of_vessel' => ['required', 'string'],
            'width_of_vessel' => ['required', 'string'],
            'depth_of_vessel' => ['required', 'string'],
            'gross_tonnage' => ['required', 'string'],
            'net_tonnage' => ['required', 'string'],
            'other_multi_color_desc' => ['required', 'string'],
            'fish_hold_capacity' => ['required', 'string'],
            'engine_no' => ['required', 'string'],
            'make_or_model' => ['required', 'string'],
            'engine_power' => ['required', 'string'],
            'onboard_mobile_number' => ['required', 'string'],
        ]);

    }

    public function vesselDescriptionStore($VesselInfo)
    {
        if($this->vessel_image_id){
            $Image = Image::findOrNew($VesselInfo->vessel_image_id);

            if($Image->image){
                if(Storage::disk('public')->exists($Image->image)){
                    Storage::disk('public')->delete($Image->image);
                }
            }
            $Image->image = $this->vessel_image_id->store('photos','public');
            $Image->save();
            $VesselInfo->vessel_image_id = $Image->id;
        }

        $VesselInfo->year_built = $this->year_built;
        $VesselInfo->place_built = $this->place_built;
        // $VesselInfo->type_of_vessel_id = $this->type_of_vessel_id;
        $VesselInfo->vessel_condition_id = $this->vessel_condition_id;
        $VesselInfo->hull_material_id = $this->hull_material_id;
        $VesselInfo->color_id = $this->color_id;
        $VesselInfo->length_of_vessel = $this->length_of_vessel;
        $VesselInfo->width_of_vessel = $this->width_of_vessel;
        $VesselInfo->depth_of_vessel = $this->depth_of_vessel;
        $VesselInfo->gross_tonnage = $this->gross_tonnage;
        $VesselInfo->net_tonnage = $this->net_tonnage;
        $VesselInfo->other_multi_color_desc = $this->other_multi_color_desc;
        $VesselInfo->fish_hold_capacity = $this->fish_hold_capacity;
        $VesselInfo->engine_no = $this->engine_no;
        $VesselInfo->make_or_model = $this->make_or_model;
        $VesselInfo->engine_power = $this->engine_power;
        $VesselInfo->onboard_mobile_number = $this->onboard_mobile_number;
        $VesselInfo->save();
    }

    public function vesselDescriptionEdit($VesselInfo)
    {
        $this->year_built = $VesselInfo->year_built;
        $this->place_built = $VesselInfo->place_built;
        // $this->type_of_vessel_id = $VesselInfo->type_of_vessel_id;
        $this->vessel_condition_id = $VesselInfo->vessel_condition_id;
        $this->hull_material_id = $VesselInfo->hull_material_id;
        $this->color_id = $VesselInfo->color_id;
        $this->vessel_image_prev = $VesselInfo->vessel_image_id;
        $this->length_of_vessel = $VesselInfo->length_of_vessel;
        $this->width_of_vessel = $VesselInfo->width_of_vessel;
        $this->depth_of_vessel = $VesselInfo->depth_of_vessel;
        $this->gross_tonnage = $VesselInfo->gross_tonnage;
        $this->net_tonnage = $VesselInfo->net_tonnage;
        $this->other_multi_color_desc = $VesselInfo->other_multi_color_desc;
        $this->fish_hold_capacity = $VesselInfo->fish_hold_capacity;
        $this->engine_no = $VesselInfo->engine_no;
        $this->make_or_model = $VesselInfo->make_or_model;
        $this->engine_power = $VesselInfo->engine_power;
        $this->onboard_mobile_number = $VesselInfo->onboard_mobile_number;
    }
}
