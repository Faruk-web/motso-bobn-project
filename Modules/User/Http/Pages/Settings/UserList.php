<?php

namespace Modules\User\Http\Pages\Settings;

use Modules\User\Models\User;
use Illuminate\Support\Facades\Hash;
use Modules\Core\Http\Common\Component;
use Illuminate\Validation\Rules\Password;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Modules\User\Models\Branch;

class UserList extends Component
{
    use WithFileUploads;

    public $user_id;
    public $name;
    public $mobile;
    public $password;
    public $password_confirmation;
    public $email;
    public $profile_picture;
    public $profile_picture_preview;
    public $role_ids = [];
    public $branch_id;
    public $user_code;

    protected $listeners = [
        'openUserModal',
        'userDelete',
    ];

    public function openUserModal($data = [])
    {
        $this->reset();
        $this->dispatchBrowserEvent('typeahead_reset');
        if (isset($data['id'])) {
            $this->userEdit($data['id']);
        }

        $this->dispatchBrowserEvent('modalOpen', 'userModal');
    }

    public function userEdit($id)
    {
        $this->user_id = $id;
        $User = User::find($id);

        if (!$User) {
            $this->alert('error', 'User not found!');
            return;
        }
        $user_code = "2023".rand(1000, 9999);
        $this->user_code =$user_code;
        $this->name = $User->name;
        $this->mobile = $User->mobile;
        $this->email = $User->email;
        $this->profile_picture_preview = $User->profile_picture;
        $this->role_ids = $User->roles->pluck('name')->toArray();
        $this->branch_id = $User->branch_id;
        $this->dispatchBrowserEvent('typeahead_update');
    }

    public function userStore()
    {
       
        $validation = [
                    'name' => ['required', 'string', 'max:255'],
                ];

        if ($this->user_id) {
            $validation = array_merge($validation, [
                'email' => ['required', 'string', 'email', 'max:255'],
                'password' => ['nullable', 'confirmed', Password::defaults()]
            ]);
        } else {
            $validation = array_merge($validation, [
                'email' => ['required', 'string', 'email', 'max:255','unique:users,email'],
                'password' => ['required', 'confirmed', Password::defaults()]
            ]);
        }

        $this->validate($validation);

        if ($this->user_id) {
            if (!ucan('user.update', 'User')) {
                $this->alert('error', 'You are not authorized to update user!');
                return;
            }

            $User = User::find($this->user_id);
        } else {
            if (!ucan('user.create', 'User')) {
                $this->alert('error', 'You are not authorized to create user!');
                return;
            }
            $User = new User();
        }
        $user_code = "2023".rand(1000, 9999);
        $User->user_code = $user_code;
        $User->name = $this->name;
        $User->mobile = $this->mobile;
        $User->email = $this->email;
        $User->branch_id = $this->branch_id??null;

        if ($this->password) {
            $User->password = Hash::make($this->password);
        }

        if ($this->profile_picture) {
            if ($User->profile_picture) {
                if (Storage::disk('public')->exists($User->profile_picture)) {
                    Storage::disk('public')->delete($User->profile_picture);
                }
            }
            $User->profile_picture = $this->profile_picture->store('photos', 'public');
        }

        $User->save();
        $User->syncRoles($this->role_ids);


        $this->emit('refreshDatatable');
        $this->dispatchBrowserEvent('modalClose', 'userModal');
        $this->alert('success', 'Profile updated successfully!');
    }

    public function userDelete($data = [])
    {
        $data = $this->alertConfirm($data);

        if (isset($data['id'])) {
            $User = User::find($data['id']);

            if (!$User) {
                $this->alert('error', 'User not found!');
                return;
            }

            if (!ucan('user.delete', 'User')) {
                $this->alert('error', 'You are not authorized to delete user!');
                return;
            }

            $User->delete();

            $this->emit('refreshDatatable');
            $this->alert('success', 'User deleted successfully!');
        }
    }

    public function render()
    {
        return view('user::pages.settings.user-list', [
            'branchs' => Branch::get()
        ])->layout('template::layouts.backend');
    }
}
