<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\Support\Renderable;

class UserController extends Controller
{
    public function index()
    {
        $routeCollection = Route::getRoutes();

        foreach ($routeCollection as $value) {
            // dd($value);
            // echo $value->getName();
        }

        return view('user::index');
    }
}