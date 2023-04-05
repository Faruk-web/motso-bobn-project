<?php

namespace Modules\Template\View\Components\Search;

use Modules\User\Models\Division;
use Illuminate\View\Component;

class Divisions extends Component
{
    public $countryId;

    public function __construct($countryId = null)
    {
        $this->countryId = $countryId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

        $Divisions = Division::orderBy('name');

        if($this->countryId){
            $Divisions->whereCountryId($this->countryId);
        }

        return view('template::components.search.divisions',[
            "divisions" => $Divisions->get()
        ]);
    }
}
