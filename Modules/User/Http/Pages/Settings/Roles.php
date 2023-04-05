<?php

namespace Modules\User\Http\Pages\Settings;

use Modules\User\Models\Role;
use Modules\User\Models\Module;
use Illuminate\Support\Facades\Auth;
use Modules\Core\Http\Common\Component;

class Roles extends Component
{
    public $role_id;
    public $name;
    public $title;
    public $guard_name = 'web';
    public $view = [];
    public $update = [];
    public $create = [];
    public $delete = [];
    public $all = [];

    protected $listeners = [
        'openRoleModal',
        'openRolePermissionModal',
        'roleDelete',
    ];

    public function updatedTitle($value)
    {
        $this->name = str_replace(' ', '_', strtolower($value));
    }

    public function openRoleModal($data = [])
    {
        $this->reset();
        if (isset($data['id'])) {
            $this->roleEdit($data['id']);
        }

        $this->dispatchBrowserEvent('modalOpen', 'RoleModal');
    }

    public function openRolePermissionModal($data = [])
    {
        $this->reset();
        $this->dispatchBrowserEvent('modalOpen', 'RolePermissionModal');
        $this->dispatchBrowserEvent('typeahead_reset');
        if (isset($data['id'])) {
            $this->role_id = $data['id'];

            $role = Role::find($this->role_id);


            $modules = Module::active()->get();
            foreach ($modules as $module) {
                if (count(config(strtolower($module->name).'.permission')) > 0) {
                    foreach (config(strtolower($module->name).'.permission') as $keyPermission => $valuePermission) {
                        $this->view[$keyPermission] = $role->hasPermissionTo($keyPermission.'.view') ? true : null;
                        $this->update[$keyPermission] = $role->hasPermissionTo($keyPermission.'.update') ? true : null;
                        $this->create[$keyPermission] = $role->hasPermissionTo($keyPermission.'.create') ? true : null;
                        $this->delete[$keyPermission] = $role->hasPermissionTo($keyPermission.'.delete') ? true : null;
                        $this->all[$keyPermission] = $role->hasPermissionTo($keyPermission.'.all') ? true : null;
                    }
                }
            }
        }
    }

    public function roleEdit($id)
    {
        $this->role_id = $id;
        $Role = Role::find($id);

        if (!$Role) {
            $this->alert('error', 'Role not found!');
            return;
        }

        $this->name = $Role->name;
        $this->title = $Role->title;
        $this->guard_name = $Role->guard_name;
    }

    public function roleStore()
    {
        $validation = [
                    'name' => ['required', 'string', 'max:255'],
                    'title' => ['required', 'string', 'max:255'],
                    'guard_name' => ['required', 'string', 'max:255'],
                ];
        $this->validate($validation);

        if ($this->role_id) {
            $Role = Role::find($this->role_id);
        } else {
            $Role = new Role();
        }

        $Role->name = $this->name;
        $Role->title = $this->title;
        $Role->guard_name = $this->guard_name;
        $Role->save();

        $this->emit('refreshDatatable');
        $this->dispatchBrowserEvent('modalClose', 'RoleModal');

        $this->alert('success', 'Role updated successfully!');
    }

     public function roleSetPermissionStore()
     {
         $role = Role::find($this->role_id);

         $permissions = collect([]);

         $modules = Module::active()->get();
         foreach ($modules as $module) {
             if (count(config(strtolower($module->name).'.permission')) > 0) {
                 foreach (config(strtolower($module->name).'.permission') as $keyPermission => $valuePermission) {
                     if (isset($this->all[$keyPermission]) && $this->all[$keyPermission] && in_array('all', $valuePermission['type'])) {
                         $permissions[] = $keyPermission;
                     } else {
                         if (isset($this->view[$keyPermission]) && $this->view[$keyPermission] && in_array('view', $valuePermission['type'])) {
                             $permissions[] = $keyPermission.'.view';
                         }

                         if (isset($this->update[$keyPermission]) && $this->update[$keyPermission] && in_array('update', $valuePermission['type'])) {
                             $permissions[] = $keyPermission.'.update';
                         }

                         if (isset($this->create[$keyPermission]) && $this->create[$keyPermission] && in_array('create', $valuePermission['type'])) {
                             $permissions[] = $keyPermission.'.create';
                         }

                         if (isset($this->delete[$keyPermission]) && $this->delete[$keyPermission] && in_array('delete', $valuePermission['type'])) {
                             $permissions[] = $keyPermission.'.delete';
                         }
                     }
                 }
             }
         }

         $role->syncPermissions($permissions);

         $this->alert('success', 'Role Permission saved');
         $this->reset();
         $this->emit('refreshDatatable');
         $this->dispatchBrowserEvent('modalClose', 'RolePermissionModal');
     }

     public function updatedAll($value, $key)
     {
         if ($value) {
             $this->view[$key] = true;
             $this->update[$key] = true;
             $this->create[$key] = true;
             $this->delete[$key] = true;
         } else {
             $this->view[$key] = false;
             $this->update[$key] = false;
             $this->create[$key] = false;
             $this->delete[$key] = false;
         }
     }

    public function roleDelete($data = [])
    {
        $data = $this->alertConfirm($data);

        if (isset($data['id'])) {
            $Role = Role::find($data['id']);

            if (!$Role) {
                $this->alert('error', 'Role not found!');
                return;
            }

            $Role->delete();

            $this->emit('refreshDatatable');
            $this->alert('success', 'Role deleted successfully!');
        }
    }

    public function render()
    {
        return view('user::pages.settings.role', [
            'modules' => Module::active()->withoutCore()->get(),
        ])->layout('template::layouts.backend');
    }
}