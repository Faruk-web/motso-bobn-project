<?php

namespace Modules\Template\View\Components;

use Illuminate\View\Component;

class Backend extends Component
{
    public function __construct()
    {
        // dd('check');
    }

    public function render()
    {
        return view('template::layouts.backend', [
            'layout_type' => 'vertical'
        ]);
    }
}
