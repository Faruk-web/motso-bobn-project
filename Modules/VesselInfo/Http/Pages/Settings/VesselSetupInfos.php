<?php

namespace Modules\VesselInfo\Http\Pages\Settings;

use Illuminate\Support\Facades\Auth;
use Modules\Core\Http\Common\Component;
use Modules\VesselInfo\Models\VesselSetupInfo;
use Modules\User\Models\Upazila;
class VesselSetupInfos extends Component
{
    public $vesselSetupInfo_id;
    public $code;
    public $status = 'A';
    public $name;
    public $description;
    public $update_date;
    public $entry_date;
    public $entry_by;
    public $update_by;
    public $type;
    public $division_code;
    public $district_code;
    public $upazila_code;
    protected $listeners = [
        'openVesselSetupInfoModal',
        'vesselSetupInfoDelete',
    ];

    public function openVesselSetupInfoModal($data = [])
    {
        $this->reset();
        $this->dispatchBrowserEvent('typeahead_reset');

        if (isset($data['id'])) {
            $this->vesselSetupInfoEdit($data['id']);
        }

        $this->dispatchBrowserEvent('modalOpen', 'vesselSetupInfoModal');
    }

    public function updatedUpazilaCode($value)
    {
        if($value){
            $this->code = Upazila::find($value)->id;
        }else{
            $this->code = null;
        }
    }

    public function vesselSetupInfoEdit($id)
    {
        $user_info= auth()->user();
        $this->vesselSetupInfo_id = $id;
        $vesselSetupInfo = VesselSetupInfo::find($id);
        // dd($vesselSetupInfo);
        if (!$vesselSetupInfo) {
            $this->alert('error', 'Vessel Setup Info not found!');
            return;
        }
        $this->update_by = $user_info->id ;
        $this->name = $vesselSetupInfo->name ;
        $this->type = $vesselSetupInfo->description;
        $this->code = $vesselSetupInfo->code ;
        $this->type = $vesselSetupInfo->type ;
        $this->status = $vesselSetupInfo->status;

        $this->dispatchBrowserEvent('type_update');


    }

    public function vesselSetupInfoStore()
    {
        $user_info= auth()->user();
        $validation = [
            // 'vessel_name' => ['required', 'string', 'max:255','unique:vessel_setup_infos,vessel_name'],
            'name' => ['required', 'string', 'max:255'],
        ];

        $this->validate($validation);

        if ($this->vesselSetupInfo_id) {
            $vesselSetupInfo = VesselSetupInfo::find($this->vesselSetupInfo_id);
        } else {
            $vesselSetupInfo = new VesselSetupInfo();
        }
        $vesselSetupInfo->entry_by = $user_info->id;
        $vesselSetupInfo->name = $this->name;
        $vesselSetupInfo->description= $this->type;
        $vesselSetupInfo->code = $this->code;
        $vesselSetupInfo->type = $this->type;
        $vesselSetupInfo->status = $this->status;
        $vesselSetupInfo->save();

        $this->emit('refreshDatatable');
        $this->dispatchBrowserEvent('modalClose', 'vesselSetupInfoModal');
        $this->alert('success', 'Vessel Setup Info updated successfully!');
    }

    public function vesselSetupInfoDelete($data = [])
    {
        $data = $this->alertConfirm($data);

        if (isset($data['id'])) {
            $vesselSetupInfo = VesselSetupInfo::find($data['id']);

            if (!$vesselSetupInfo) {
                $this->alert('error', 'Vessel Setup Info not found!');
                return;
            }

            $vesselSetupInfo->delete();

            $this->emit('refreshDatatable');
            $this->alert('success', 'Vessel Setup Info deleted successfully!');
        }
    }

    public function render()
    {
        return view('vesselinfo::pages.settings.vessel-setup-info')->layout('template::layouts.backend');
    }
}

