<?php

namespace Modules\Template\View\Components\Search;

use Modules\User\Models\District;
use Illuminate\View\Component;

class Districts extends Component
{
    public $divisionId;

    public function __construct($divisionId = null)
    {
        $this->divisionId = $divisionId;
    }

    public function render()
    {

        $District = District::orderBy('name');

        // if($this->divisionId){
        //     $District->whereDivisionId($this->divisionId);
        // }

        return view('template::components.search.districts',[
            "districts" => $District->get()
        ]);
    }
}
