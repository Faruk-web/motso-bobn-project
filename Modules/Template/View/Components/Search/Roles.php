<?php

namespace Modules\Template\View\Components\Search;

use Modules\User\Models\Role;
use Illuminate\View\Component;

class Roles extends Component
{
    public $type;

    public function __construct($type = null)
    {
        $this->type = $type;
    }

    public function render()
    {
        $Role = Role::query();

        if ($this->type) {
            $Role->where('type', $this->type);
        }

        return view('template::components.search.roles', [
            'roles' =>  $Role->get()
        ]);
    }
}