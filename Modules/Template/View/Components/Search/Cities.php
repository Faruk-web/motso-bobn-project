<?php

namespace Modules\Template\View\Components\Search;

use App\Models\City;
use App\Models\District;
use Illuminate\View\Component;

class Cities extends Component
{
    public function render()
    {
        return view('template::components.search.cities', [
            "cities" => City::orderBy('name')->get()
        ]);
    }
}
