<?php

namespace Modules\Template\View\Components;

use Nwidart\Modules\Json;
use Modules\User\Models\Menu;
use Illuminate\View\Component;
use Nwidart\Modules\Facades\Module;

class SideMenu extends Component
{
    public function __construct()
    {
        $modules = Module::allEnabled();
        $allMenu = [];

        foreach ($modules as $key => $module) {
            $allMenu[] =  $module->getName();
        }
    }

    public function render()
    {
        return view('template::components.sidemenu', [
            'menus' => Menu::with('Module')->active()->rootMenu()->get()
        ]);
    }
}
