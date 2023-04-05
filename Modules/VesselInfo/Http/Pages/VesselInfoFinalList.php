<?php

namespace Modules\VesselInfo\Http\Pages;
use Modules\VesselInfo\Models\VesselInfo;
use Modules\VesselInfo\Models\PortInfo;
use Illuminate\Support\Facades\Auth;
use Modules\Core\Http\Common\Component;

class VesselInfoFinalList extends Component
{
    public $portInfo_id;
    public $status;
   
    protected $listeners = [
        'openVesselInfoDraftModal',
        'portInfoDelete',
    ];

    public function openVesselInfoDraftModal($data = [])
    {
        $this->reset();
        if (isset($data['id'])) {
            $this->portInfoEdit($data['id']);
        }

        $this->dispatchBrowserEvent('modalOpen', 'portInfoModal');
    }

    public function portInfoEdit($id)
    {
        $this->portInfo_id = $id;
        $portInfo = VesselInfo::find($id);

        if (!$portInfo) {
            $this->alert('error', 'portInfo not found!');
            return;
        }

        $this->status = $portInfo->status ;

    }

    public function portInfoStore()
    {
        $validation = [
                    'status' => ['required', 'string', 'max:255'],
                ];
        $this->validate($validation);

        if ($this->portInfo_id) {
            $portInfo = VesselInfo::find($this->portInfo_id);
        } else {
            $portInfo = new VesselInfo();
        }

        $portInfo->status = $this->status;
        $portInfo->save();

        $this->emit('refreshDatatable');
        $this->dispatchBrowserEvent('modalClose', 'portInfoModal');
        $this->alert('success', 'VesselInfo updated successfully!');
    }

    public function render()
    {
        return view('vesselinfo::pages.vessel-info-final-list')->layout('template::layouts.backend');
    }
}
