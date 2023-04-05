<?php

namespace Modules\VesselInfo\Http\Pages;
use Modules\VesselInfo\Models\VesselInfo;
use Modules\VesselInfo\Models\PortInfo;
use Illuminate\Support\Facades\Auth;
use Modules\Core\Http\Common\Component;

class VesselInfoList extends Component
{
    public $vesselInfo_id;
    public $status;
    public $cross_checked_by;
    public $validation_status;
    protected $listeners = [
        'vessellistInfoModal',
        'vessellistInfoDeleteModal'
    ];

    public function vessellistInfoModal($data = [])
    {
        $this->reset();
        if (isset($data['id'])) {
            $this->vesselInfoEdit($data['id']);
        }

        $this->dispatchBrowserEvent('modalOpen', 'vessellistInfoModal');
    }

    public function vessellistInfoDeleteModal($data = [])
    {
        $this->reset();
        if (isset($data['id'])) {
            $this->vesselInfoEdit($data['id']);
        }

        $this->dispatchBrowserEvent('modalOpen', 'vessellistInfoDeleteModal');
    }

    public function vesselInfoEdit($id)
    {
        $user_info= auth()->user();
       
        $this->vesselInfo_id = $id;
        $VesselInfo = VesselInfo::find($id);

        if (!$VesselInfo) {
            $this->alert('error', 'VesselInfo not found!');
            return;
        }
       
        $this->status = $VesselInfo->status ;
        $this->cross_checked_by = $user_info->id;
        $this->validation_status = 'PR';
      

    }

    public function portInfoStore()
    {
        $validation = [
                    'status' => ['required', 'string', 'max:255'],
                ];
        $this->validate($validation);

        if ($this->vesselInfo_id) {
            $VesselInfo = VesselInfo::find($this->vesselInfo_id);
        } else {
            $VesselInfo = new VesselInfo();
        }

        $VesselInfo->status = $this->status;
        $VesselInfo->save();

        $this->emit('refreshDatatable');
        $this->dispatchBrowserEvent('modalClose', 'vessellistInfoModal');
        $this->alert('success', 'VesselInfo updated successfully!');
    }

    public function vesselInfoDelete()
    {
        if ($this->vesselInfo_id) {
            $VesselInfo = VesselInfo::find($this->vesselInfo_id);
        } else {
            $VesselInfo = new VesselInfo();
        }

        $VesselInfo->status = 4;
        $VesselInfo->save();

        $this->emit('refreshDatatable');
        $this->dispatchBrowserEvent('modalClose', 'vessellistInfoDeleteModal');
        $this->alert('success', 'VesselInfo updated successfully!');
    }

    public function render()
    {
        return view('vesselinfo::pages.vessel-info-list')->layout('template::layouts.backend');
    }
}
