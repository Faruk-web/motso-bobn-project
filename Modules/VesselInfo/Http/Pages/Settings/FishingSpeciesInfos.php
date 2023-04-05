<?php

namespace Modules\VesselInfo\Http\Pages\Settings;
use Modules\VesselInfo\Models\FishingSpeciesInfo;
use Modules\Core\Http\Common\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Modules\User\Models\Upazila;
class FishingSpeciesInfos extends Component
{
    use WithFileUploads;
    public $fishingSpeciesInfo_id;
    public $name;
    public $code;
    public $entry_by;
    public $update_by;
    public $status;
    public $species_image;
    public $species_image_pre;
    public $division_code;
    public $district_code;
    public $upazila_code;
    protected $listeners = [
        'openFishingSpeciesInfoModal',
        'fishingSpeciesInfoDelete',
    ];

    public function openFishingSpeciesInfoModal($data = [])
    {
        $this->reset();
        if (isset($data['id'])) {
            $this->fishingSpeciesInEdit($data['id']);
        }

        $this->dispatchBrowserEvent('modalOpen', 'fishingSpeciesInfoModal');
    }
    public function updatedUpazilaCode($value)
    {
        if($value){
            $this->code = Upazila::find($value)->id;
        }else{
            $this->code = null;
        }
    }
    public function fishingSpeciesInEdit($id)
    {
        $user_info= auth()->user();
        $this->fishingSpeciesInfo_id = $id;
        $FishingSpeciesInfo = FishingSpeciesInfo::find($id);
        if (!$FishingSpeciesInfo) {
            $this->alert('error', 'FishingAreaInfo not found!');
            return;
        }
        $this->update_by= $user_info->id;
        $this->name= $FishingSpeciesInfo->name;
        $this->code= $FishingSpeciesInfo->code;
        $this->status=$FishingSpeciesInfo->status;
        $this->species_image=$FishingSpeciesInfo->species_image;
        
    }
    public function fishingSpeciesInfoStore()
    {
        $user_info= auth()->user();
        $validation = [
            'name' => ['required', 'string', 'max:255'],
        ];
        $this->validate($validation);
        if ($this->fishingSpeciesInfo_id) {
            $FishingSpeciesInfo = FishingSpeciesInfo::find($this->fishingSpeciesInfo_id);
        } else {
            $FishingSpeciesInfo = new FishingSpeciesInfo();
        }
        $FishingSpeciesInfo->entry_by = $user_info->id;
        $FishingSpeciesInfo->name = $this->name;
        $FishingSpeciesInfo->code = $this->code;
        $FishingSpeciesInfo->status = $this->status;
        if($this->species_image){
            if($FishingSpeciesInfo->species_image){
                if(Storage::disk('public')->exists($FishingSpeciesInfo->species_image)){
                    Storage::disk('public')->delete($FishingSpeciesInfo->species_image);
                }
            }
            $FishingSpeciesInfo->species_image = $this->species_image->store('photos','public');
        }
        $FishingSpeciesInfo->save();

        $this->emit('refreshDatatable');
        $this->dispatchBrowserEvent('modalClose', 'fishingSpeciesInfoModal');
        $this->alert('success', 'FishingSpeciesInfo updated successfully!');
    }

    public function fishingSpeciesInfoDelete($data = [])
    {
        $data = $this->alertConfirm($data);

        if (isset($data['id'])) {
            $FishingSpeciesInfo = FishingSpeciesInfo::find($data['id']);

            if (!$FishingSpeciesInfo) {
                $this->alert('error', 'FishingSpeciesInfo not found!');
                return;
            }

            $FishingSpeciesInfo->delete();

            $this->emit('refreshDatatable');
            $this->alert('success', 'FishingSpeciesInfo deleted successfully!');
        }
    }

    public function render()
    {
        return view('vesselinfo::pages.settings.fishing-species-info')->layout('template::layouts.backend');
    }
}


