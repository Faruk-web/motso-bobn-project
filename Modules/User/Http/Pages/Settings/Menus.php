<?php

namespace Modules\User\Http\Pages\Settings;

use Nwidart\Modules\Json;
use Modules\User\Models\Menu;
use Nwidart\Modules\Facades\Module;
use Illuminate\Support\Facades\Auth;
use Modules\Core\Http\Common\Component;
use Modules\User\Models\Module as UserModule;

class Menus extends Component
{
    public $menu_id;
    public $name;
    public $parent_id;
    public $route_name;
    public $module_id;
    public $icon;
    public $status;
    public $entry_by;
    public $update_by;
    protected $listeners = [
        'openMenuModal',
        'menuDelete',
    ];

    public function openMenuModal($data = [])
    {
        $this->reset(['menu_id', 'name', 'parent_id', 'route_name', 'module_id', 'status']);
        if (isset($data['id'])) {
            $this->menuEdit($data['id']);
        }

        $this->dispatchBrowserEvent('modalOpen', 'MenuModal');
    }

    public function menuEdit($id)
    {
        $user_info= auth()->user();
        $this->menu_id = $id;
        $Menu = Menu::find($id);

        if (!$Menu) {
            $this->alert('error', 'Menu not found!');
            return;
        }

        $this->name = $Menu->name;
        $this->parent_id = $Menu->parent_id;
        $this->route_name = $Menu->route_name;
        $this->module_id = $Menu->module_id;
        $this->icon = $Menu->icon;
        $this->status = $Menu->status;
        $this->update_by = $user_info->id;
    }

    public function menuStore()
    {
        $user_info= auth()->user();
        $validation = [
                    'name' => ['required', 'string', 'max:255'],
                    'parent_id' => ['nullable', 'integer'],
                    'route_name' => ['required', 'string', 'max:255'],
                    'module_id' => ['required', 'integer'],
                    'icon' => ['nullable', 'string', 'max:255'],
                    'status' => ['required', 'integer'],
                ];

        $this->validate($validation);

        if ($this->menu_id) {
            $Menu = Menu::find($this->menu_id);
        } else {
            $Menu = new Menu();
        }
        $Menu->entry_by = $user_info->id;
        $Menu->name = $this->name;
        $Menu->parent_id = $this->parent_id;
        $Menu->route_name = $this->route_name;
        $Menu->module_id = $this->module_id;
        $Menu->icon = $this->icon;
        $Menu->status = $this->status;
        $Menu->save();

        $this->emit('refreshDatatable');
        $this->dispatchBrowserEvent('modalClose', 'MenuModal');
        $this->alert('success', 'Menu updated successfully!');
    }

    public function menuDelete($data = [])
    {
        $data = $this->alertConfirm($data);

        if (isset($data['id'])) {
            $Menu = Menu::find($data['id']);

            if (!$Menu) {
                $this->alert('error', 'Menu not found!');
                return;
            }

            $Menu->delete();

            $this->emit('refreshDatatable');
            $this->alert('success', 'Menu deleted successfully!');
        }
    }

    public function render()
    {
        $routeList = [];

        if ($this->module_id) {
            $UserModule = UserModule::find($this->module_id);
            $module = Module::find($UserModule->name);
            if (file_exists($module->getPath().'/common.json')) {
                $data = new Json($module->getPath().'/common.json');
                $routeList = array_merge($routeList, $data->get('route'));
            }
        }

        return view('user::pages.settings.menu', [
            'parent_menus' => Menu::whereNull('parent_id')->active()->get(),
            'modules' => UserModule::active()->withoutCore()->get(),
            'route_list' => $routeList,
        ])->layout('template::layouts.backend');
    }
}
