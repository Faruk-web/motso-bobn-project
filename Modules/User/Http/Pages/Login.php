<?php

namespace Modules\User\Http\Pages;

use Illuminate\Support\Facades\Auth;
use Modules\Core\Http\Common\Component;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Modules\Core\Providers\RouteServiceProvider;
use Illuminate\Support\Str;
use Modules\User\Models\SoftwareSetting;

class Login extends Component
{
    public $email;
    public $password;
    public $remember;
    public $background_imag_pre;
    public function login()
    {
        $this->validate([
            'email' => ['required', 'string', 'email', 'max:255','exists:users,email'],
            'password' => 'required|string',
        ]);

        $this->ensureIsNotRateLimited();

        if (Auth::attempt([
            'email' => $this->email,
            'password' => $this->password,
        ], $this->remember)) {

            Auth::logoutOtherDevices($this->password);

            return redirect()->intended(RouteServiceProvider::HOME);
        } else {
            RateLimiter::hit($this->throttleKey());

            // if (User::where('email', $this->email)->exists()) {
            //     $this->addError('email', 'Your account is banned. Please contact admin.');

            //     return true;
            // }

            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
    }

    public function ensureIsNotRateLimited()
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    public function throttleKey()
    {
        return Str::lower($this->email) . '|' . request()->ip();
    }

    public function render()
    {
        $softwareSetting=SoftwareSetting::first();
        // dd($softwareSetting);
        return view('user::pages.login',compact('softwareSetting'))->layout('template::layouts.auth');
    }
}
