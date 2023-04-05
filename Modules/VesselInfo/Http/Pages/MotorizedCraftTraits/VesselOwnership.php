<?php
namespace Modules\VesselInfo\Http\Pages\MotorizedCraftTraits;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Modules\VesselInfo\Models\VesselOwnerInfo;
use Modules\VesselInfo\Models\Image;
trait VesselOwnership
{
    use WithFileUploads;
    //-- VESSEL OWNERSHIP--//
    public $ownership_type;
    public $number_of_owners;
    public $primary_name;
    public $primary_phone;
    public $primary_nid;
    public $primary_fid;
    public $primary_address;
    public $primary_image;
    public $primary_image_prev;
    public $image_id;
    public $status;
    public $secondary_name;
    public $secondary_phone;
    public $secondary_nid;
    public $secondary_image;
    public $secondary_image_prev;

    public function vesselOwnershipValidation()
    {
        # Validation @request
        $this->validate([
            'ownership_type' => ['required', 'integer'],
            'number_of_owners' => ['required', 'string'],
            // 'name' => ['required', 'string'],
            // 'phone' => ['required', 'string'],
            // 'nid' => ['required', 'string'],
            // 'fid' => ['required', 'string'],
            // 'address' => ['required', 'string'],
        ]);

    }

    public function vesselOwnershipStore($VesselInfo)
    {
        $VesselOwenerInfoPrimary = VesselOwnerInfo::findOrNew($VesselInfo->primary_owner_id);
        $VesselOwenerInfoPrimary->name = $this->primary_name;
        $VesselOwenerInfoPrimary->phone = $this->primary_phone;
        $VesselOwenerInfoPrimary->nid = $this->primary_nid;
        $VesselOwenerInfoPrimary->fid = $this->primary_fid;
        $VesselOwenerInfoPrimary->address = $this->primary_address;
        $VesselOwenerInfoPrimary->status = 'A';
        if($this->primary_image){
            $Image = Image::findOrNew($VesselInfo->primary_image);

            if($Image->image){
                if(Storage::disk('public')->exists($Image->image)){
                    Storage::disk('public')->delete($Image->image);
                }
            }
            $Image->image = $this->primary_image->store('photos','public');
            $Image->save();
            $VesselOwenerInfoPrimary->image_id = $Image->id;
        }
        $VesselOwenerInfoPrimary->save();
        $VesselInfo->primary_owner_id = $VesselOwenerInfoPrimary->id;

        $VesselOwnerInfoSecondary = VesselOwnerInfo::findOrNew($VesselInfo->secondary_owner_id);
        $VesselOwnerInfoSecondary->name = $this->secondary_name;
        $VesselOwnerInfoSecondary->nid = $this->secondary_nid;
        $VesselOwnerInfoSecondary->phone = $this->secondary_phone;
        if($this->secondary_image){
            $Image = Image::findOrNew($VesselInfo->secondary_image);

            if($Image->image){
                if(Storage::disk('public')->exists($Image->image)){
                    Storage::disk('public')->delete($Image->image);
                }
            }
            $Image->image = $this->secondary_image->store('photos','public');
            $Image->save();
            $VesselOwenerInfoPrimary->image_id = $Image->id;
        }
        $VesselOwnerInfoSecondary->save();
        $VesselInfo->secondary_owner_id = $VesselOwnerInfoSecondary->id;
        $VesselInfo->ownership_type = $this->ownership_type;
        $VesselInfo->number_of_owners = $this->number_of_owners;
        $VesselInfo->save();
    }

    public function vesselOwnershipEdit($VesselInfo)
    {
        $this->ownership_type = $VesselInfo->ownership_type;
        $this->number_of_owners = $VesselInfo->number_of_owners;


        $VesselOwnerInfoPrimary = VesselOwnerInfo::find($VesselInfo->primary_owner_id);
        if($VesselOwnerInfoPrimary){
            $this->primary_name = $VesselOwnerInfoPrimary->name;
            $this->primary_phone = $VesselOwnerInfoPrimary->phone;
            $this->primary_nid = $VesselOwnerInfoPrimary->nid;
            $this->primary_fid = $VesselOwnerInfoPrimary->fid;
            $this->primary_address = $VesselOwnerInfoPrimary->address;
            $this->primary_image_prev = $VesselOwnerInfoPrimary->fishing_permit_image_id;
        }

        $VesselOwnerInfoSecondary = VesselOwnerInfo::find($VesselInfo->secondary_owner_id);
        if($VesselOwnerInfoSecondary){
            $this->secondary_name = $VesselOwnerInfoSecondary->name;
            $this->secondary_phone = $VesselOwnerInfoSecondary->phone;
            $this->secondary_nid = $VesselOwnerInfoSecondary->nid;
            $this->secondary_image_prev = $VesselOwnerInfoSecondary->fishing_permit_image_id;
        }        
    }
}
