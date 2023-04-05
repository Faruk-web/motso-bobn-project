<?php

namespace Modules\VesselInfo\Http\Pages\Settings;

use Illuminate\Support\Facades\Auth;
use Modules\Core\Http\Common\Component;
use Modules\VesselInfo\Models\FishingAreaInfo;
use Modules\User\Models\Upazila;

class FishingAreaInfos extends Component
{
    public $fishingAreaInfo_id;
    public $name;
    public $description;
    public $code;
    public $status;
    public $entry_by;
    public $update_by;
    public $entry_date;
    public $update_date;
    public $division_code;
    public $district_code;
    public $upazila_code;
    protected $listeners = [
        'openFishingAreaInfoModal',
        'fishingAreaInfoDelete',
    ];

    public function openFishingAreaInfoModal($data = [])
    {
        $this->reset();
        if (isset($data['id'])) {
            $this->fishingAreaInfoEdit($data['id']);
        }

        $this->dispatchBrowserEvent('modalOpen', 'fishingAreaInfoModal');
    }
    public function updatedUpazilaCode($value)
    {
        if($value){
            $this->code = Upazila::find($value)->id;
        }else{
            $this->code = null;
        }
    }
    public function fishingAreaInfoEdit($id)
    {
        $user_info= auth()->user();
        $this->fishingAreaInfo_id = $id;
        $FishingAreaInfo = FishingAreaInfo::find($id);

        if (!$FishingAreaInfo) {
            $this->alert('error', 'FishingAreaInfo not found!');
            return;
        }
        $this->update_by = $user_info->id;
        $this->name = $FishingAreaInfo->name ;
        $this->description = $FishingAreaInfo->description ;
        $this->code = $FishingAreaInfo->code ;
        $this->status = $FishingAreaInfo->status ;
    }

    public function fishingAreaInfoStore()
    {
        $user_info= auth()->user();
        $validation = [
                    'name' => ['required', 'string', 'max:255'],
                ];
        $this->validate($validation);

        if ($this->fishingAreaInfo_id) {
            $FishingAreaInfo = FishingAreaInfo::find($this->fishingAreaInfo_id);
        } else {
            $FishingAreaInfo = new FishingAreaInfo();
        }
        $FishingAreaInfo->entry_by = $user_info->id;
        $FishingAreaInfo->name = $this->name;
        $FishingAreaInfo->description = $this->description;
        $FishingAreaInfo->code = $this->code;
        $FishingAreaInfo->status = $this->status;

        $FishingAreaInfo->save();

        $this->emit('refreshDatatable');
        $this->dispatchBrowserEvent('modalClose', 'fishingAreaInfoModal');
        $this->alert('success', 'FishingAreaInfo updated successfully!');
    }

    public function fishingAreaInfoDelete($data = [])
    {
        $data = $this->alertConfirm($data);

        if (isset($data['id'])) {
            $FishingAreaInfo = FishingAreaInfo::find($data['id']);

            if (!$FishingAreaInfo) {
                $this->alert('error', 'FishingAreaInfo not found!');
                return;
            }

            $FishingAreaInfo->delete();

            $this->emit('refreshDatatable');
            $this->alert('success', 'FishingAreaInfo deleted successfully!');
        }
    }

    public function render()
    {
        return view('vesselinfo::pages.settings.fishing-area-info')->layout('template::layouts.backend');
    }
}
