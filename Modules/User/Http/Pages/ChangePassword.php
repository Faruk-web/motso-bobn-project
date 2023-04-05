<?php

namespace Modules\User\Http\Pages;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Modules\Core\Http\Common\Component;

class ChangePassword extends Component
{
    public $current_password;
    public $password;
    public $password_confirmation;

    public function passwordChangeStore()
    {
        $this->validate([
            'current_password' => ['required'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $user = Auth::User();

        if (Hash::check($this->current_password, $user->password)) {
            $user->password = Hash::make($this->password);
            $user->save();
        } else {
            $this->addError('current_password', 'Current password is wrong please try again..');

            return true;
        }

        $this->reset();


        $this->alert('success', 'Profile updated successfully!');
    }

    public function render()
    {
        return view('user::pages.change-password')->layout('template::layouts.backend');
    }
}
