<?php

namespace Modules\VesselInfo\Http\Pages\Settings;

use Modules\VesselInfo\Models\PortInfo;
use Illuminate\Support\Facades\Auth;
use Modules\Core\Http\Common\Component;
use Modules\User\Models\Upazila;
class PortInfos extends Component
{
    public $portInfo_id;
    public $name;
    public $code;
    public $address;
    public $status;
    public $update_date;
    public $entry_date;
    public $entry_by;
    public $update_by;
    public $division_code;
    public $district_code;
    public $upazila_code;
    protected $listeners = [
        'openPortInfoModal',
        'portInfoDelete',
    ];

    public function openPortInfoModal($data = [])
    {
        $this->reset();
        if (isset($data['id'])) {
            $this->portInfoEdit($data['id']);
        }

        $this->dispatchBrowserEvent('modalOpen', 'portInfoModal');
    }
    public function updatedUpazilaCode($value)
    {
        if($value){
            $this->code = Upazila::find($value)->id;
        }else{
            $this->code = null;
        }
    }
    public function portInfoEdit($id)
    {
        $user_info= auth()->user();
        $this->portInfo_id = $id;
        $portInfo = PortInfo::find($id);

        if (!$portInfo) {
            $this->alert('error', 'portInfo not found!');
            return;
        }
        $this->update_by = $user_info->id ;
        $this->name = $portInfo->name ;
        $this->code = $portInfo->code ;
        $this->status = $portInfo->status;

    }

    public function portInfoStore()
    {
        $user_info= auth()->user();
        $validation = [
                    'name' => ['required', 'string', 'max:255'],
                ];
        $this->validate($validation);

        if ($this->portInfo_id) {
            $portInfo = PortInfo::find($this->portInfo_id);
        } else {
            $portInfo = new PortInfo();
        }
        $portInfo->entry_by = $user_info->id;
        $portInfo->name = $this->name;
        $portInfo->code = $this->code;
        $portInfo->address = $this->address;
        $portInfo->status = $this->status;

        $portInfo->save();

        $this->emit('refreshDatatable');
        $this->dispatchBrowserEvent('modalClose', 'portInfoModal');
        $this->alert('success', 'portInfo updated successfully!');
    }

    public function portInfoDelete($data = [])
    {
        $data = $this->alertConfirm($data);

        if (isset($data['id'])) {
            $portInfo = PortInfo::find($data['id']);

            if (!$portInfo) {
                $this->alert('error', 'portInfo not found!');
                return;
            }

            $portInfo->delete();

            $this->emit('refreshDatatable');
            $this->alert('success', 'portInfo deleted successfully!');
        }
    }

    public function render()
    {
        return view('vesselinfo::pages.settings.port-info')->layout('template::layouts.backend');
    }
}
