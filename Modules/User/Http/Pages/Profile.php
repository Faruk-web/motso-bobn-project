<?php

namespace Modules\User\Http\Pages;

use Illuminate\Support\Facades\Auth;
use Modules\Core\Http\Common\Component;
use Modules\User\Models\User;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Profile extends Component
{
    use WithFileUploads;
    public $name;
    public $user_id;
    public $email;
    public $mobile;
    public $profile_picture;
    public $profile_picture_pre;
    public $link = 'leoteachbd.com';

    public function userUpdate()
    {
        $validation = [
            'profile_picture' => ['nullable', 'image', 'max:1024'],
        ];
        $this->validate($validation);
        $User = Auth::User();

        if ($this->profile_picture) {
            if ($User->profile_picture) {
                if (Storage::disk('public')->exists($User->profile_picture)) {
                    Storage::disk('public')->delete($User->profile_picture);
                }
            }
            $User->profile_picture = $this->profile_picture->store('photos', 'public');
        }
        $User->save();
        
        $this->alert('success', 'Profile updated successfully!');
    }


    public function mount()
    {
        $User = Auth()->user();
        $this->profile_picture_pre = $User->profile_picture;
    }


    public function render()
    {
        $users = auth()->user();
        $user_branch = User::with('Branch')->where('id',$users->id)->get();
        return view('user::pages.profile', compact('users','user_branch'))->layout('template::layouts.backend');
    }
}