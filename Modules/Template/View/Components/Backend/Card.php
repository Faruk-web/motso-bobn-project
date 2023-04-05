<?php

namespace Modules\Template\View\Components\Backend;

use Illuminate\View\Component;

class Card extends Component
{
    public function __construct()
    {
        //
    }

    public function render()
    {
        return view('template::layouts.backend.card');
    }
}
