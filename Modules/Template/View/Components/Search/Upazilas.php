<?php

namespace Modules\Template\View\Components\Search;

use Modules\User\Models\Upazila;
use Illuminate\View\Component;

class Upazilas extends Component
{
    public $districtId;

    public function __construct($districtId = null)
    {
        $this->districtId = $districtId;
    }

    public function render()
    {
        $Upazila = Upazila::orderBy('name');

        // if($this->districtId){
        //     $Upazila->whereDistrictId($this->districtId);
        // }

        return view('template::components.search.upazilas', [
            "upazilas" => $Upazila->get()
        ]);
    }
}