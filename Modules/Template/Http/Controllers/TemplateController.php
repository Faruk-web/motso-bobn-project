<?php

namespace Modules\Template\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Core\Http\Controllers\Controller;

class TemplateController extends Controller
{
    public function index()
    {
        return view('template::index');
    }
}
