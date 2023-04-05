<?php

namespace Modules\Core\Http\Common;

use Livewire\Component as BaseComponent;
use Illuminate\Http\Request;
use Modules\Core\Traits\WithSweetAlert;

abstract class Component extends BaseComponent
{
    use WithSweetAlert;
}
