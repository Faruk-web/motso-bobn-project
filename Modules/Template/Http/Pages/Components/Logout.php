<?php

namespace Modules\Template\Http\Pages\Components;

use Modules\Core\Http\Common\Component;
use Illuminate\Support\Facades\Auth;

class Logout extends Component
{
    public function logout()
    {
        Auth::logout();

        session()->flash('success', 'You are Logout successful.');

        return redirect()->route('login');
    }

    public function render()
    {
        return view('template::pages.components.logout');
    }
}
