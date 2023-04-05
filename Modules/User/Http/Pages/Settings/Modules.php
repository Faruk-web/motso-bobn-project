<?php

namespace Modules\User\Http\Pages\Settings;

use Modules\User\Models\Module;
use Illuminate\Support\Facades\Hash;
use Modules\Core\Http\Common\Component;
use Illuminate\Validation\Rules\Password;

class Modules extends Component
{
    public $module_id;
    public $name;
    public $path;
    public $entry_by;
    public $update_by;
    protected $listeners = [
        'openModuleModal',
        'moduleDelete',
    ];

    public function openModuleModal($data = [])
    {
        $this->reset();
        if (isset($data['id'])) {
            $this->moduleEdit($data['id']);
        }

        $this->dispatchBrowserEvent('modalOpen', 'moduleModal');
    }

    public function moduleEdit($id)
    {
        $user_info= auth()->user(); 
        $this->module_id = $id;
        $module = Module::find($id);

        if (!$module) {
            $this->alert('error', 'Module not found!');
            return;
        }
        $this->update_by = $user_info->id;
        $this->name = $module->name;
        $this->path = $module->path;
    }

    public function moduleStore()
    {
        $user_info= auth()->user(); 
        $validation = [
                    'name' => ['required', 'string', 'max:255'],
                ];

        $this->validate($validation);

        if ($this->module_id) {
            $module = Module::find($this->module_id);
        } else {
            $module = new Module();
        }
        $module->entry_by = $user_info->id;
        $module->name = $this->name;
        $module->path = $this->path;


        $module->save();

        $this->emit('refreshDatatable');
        $this->dispatchBrowserEvent('modalClose', 'moduleModal');
        $this->alert('success', 'Module updated successfully!');
    }

    public function moduleDelete($data = [])
    {
        $data = $this->alertConfirm($data);

        if (isset($data['id'])) {
            $module = Module::find($data['id']);

            if (!$module) {
                $this->alert('error', 'Module not found!');
                return;
            }

            $module->delete();

            $this->emit('refreshDatatable');
            $this->alert('success', 'Module deleted successfully!');
        }
    }

    public function render()
    {
        return view('user::pages.settings.module')->layout('template::layouts.backend');
    }
}
