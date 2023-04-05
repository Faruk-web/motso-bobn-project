<?php

namespace Modules\User\Http\Pages;

use Illuminate\Support\Facades\Auth;
use Modules\Core\Http\Common\Component;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Modules\Core\Providers\RouteServiceProvider;
use Illuminate\Support\Str;

class ConfirmPassword extends Component
{
    public $password;
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
        return view('user::pages.confirm-password')->layout('template::layouts.auth');
    }
}
