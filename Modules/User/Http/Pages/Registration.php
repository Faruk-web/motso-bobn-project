<?php

namespace Modules\User\Http\Pages;

use Illuminate\Support\Str;
use Modules\User\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\Core\Http\Common\Component;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Modules\Core\Providers\RouteServiceProvider;
use Modules\User\Models\SoftwareSetting;

class Registration extends Component
{
    public $name;
    public $password;
    public $password_confirmation;
    public $email;

    public function register()
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255','unique:users,email'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $User = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        // $User->assignRole('client');

        $this->reset();

        $this->alert('success', 'Your Registration is Successfull. You can signin now.');
    }

    public function render()
    {
        $softwareSetting=SoftwareSetting::first();
        return view('user::pages.registration',compact('softwareSetting'))->layout('template::layouts.auth');
    }
}
