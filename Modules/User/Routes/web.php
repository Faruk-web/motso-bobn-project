<?php

use Illuminate\Support\Facades\Route;
use Modules\User\Http\Middleware\DashboardCheck;

Route::get('login', 'Pages\Login')->name('login')->middleware('guest');
Route::get('registration', 'Pages\Registration')->name('registration')->middleware('guest');
Route::get('reset-password', 'Pages\ResetPassword')->name('reset_password')->middleware('guest');
Route::get('verify-email', 'Pages\VerifyEmail')->name('verify_email')->middleware('guest');
Route::get('confirm-password', 'Pages\ConfirmPassword')->name('confirm_password')->middleware('guest');

Route::get('report/am', 'Controllers\EmployeeController@showEmployees')->name('report.m.index');
Route::get('/products/create-pdf/{id?}', 'Controllers\EmployeeController@exportPDF')->name('report.mpdf.index');

Route::get('report', 'Controllers\BranchReportController@index')->name('report.index');
Route::get('post', 'Controllers\PostController@index')->name('posts.index');
    Route::get('create', 'Controllers\PostController@create')->name('post.create');
    Route::post('post', 'Controllers\PostController@store')->name('post.store');
     Route::get('/post-show/{id}', 'Controllers\PostController@show')->name('post.show');
Route::post('/comment/store', 'Controllers\CommentController@store')->name('comments.store');
Route::get('search/Vessel/report', 'Controllers\PostController@search_VesselInfo')->name('search_Vessel_report');

Route::group(['prefix' => 'member', 'as' => 'user.','middleware' => ['auth']], function () {
    Route::get('/', 'Pages\Dashboard')->name('dashboard')->middleware(DashboardCheck::class);
    Route::get('profile', 'Pages\Profile')->name('profile');
    Route::get('password', 'Pages\ChangePassword')->name('password');
    Route::group(['prefix' => 'setting', 'as' => 'setting.'], function () {
        Route::get('user', 'Pages\Settings\UserList')->name('user');
        Route::get('menu', 'Pages\Settings\Menus')->name('menu')->middleware('role:superadmin');
        Route::get('module', 'Pages\Settings\Modules')->name('module');
        Route::get('softwaresetting', 'Pages\Settings\SoftwareSettings')->name('softwaresetting');
        Route::get('branch', 'Pages\Settings\Branchs')->name('branch');
        Route::get('role', 'Pages\Settings\Roles')->name('role');
       
    });

    Route::get('datatable', 'Controllers\DatatableController@index')->name('datatable');
    

});
