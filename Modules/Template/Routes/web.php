<?php

use Nwidart\Modules\Facades\Module;
use Illuminate\Support\Facades\Route;

if (checkModule('Website')) {
    Route::get('/', function () {
        return redirect(route('website.home'));
    });
} elseif (checkModule('User')) {
    Route::get('/', function () {
        return redirect(route('user.dashboard'));
    });
} else {
    Route::get('/', function () {
        return view('welcome');
    });
}