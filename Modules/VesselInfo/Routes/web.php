<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'vesselinfo', 'as' => 'vesselinfo.'], function () {
    Route::get('motorized-craft/{id?}', 'Pages\MotorizedCraft')->name('motorized_craft');

    // Route::get('/people', 'Controllers\SearchController@index');
    Route::get('/people', 'Controllers\SearchController@index');
    Route::get('/people/simple', 'Controllers\SearchController@simple')->name('simple_search');
    Route::get('/people/advance', 'Controllers\SearchController@advance')->name('advance_search');

    // Route::group(['prefix' => 'motorized-craft', 'as' => 'motorized_craft.'], function () {
    //     Route::get('/{id?}', 'Pages\MotorizedCraft')->name('index');
    //     Route::get('{id?}/status', 'Pages\MotorizedCraft')->name('status');
    //     Route::get('{id?}/leagel', 'Pages\MotorizedCraft')->name('legal');
    // });EmployeeController
    Route::get('/report', [EmployeeController::class, 'showEmployees']);
    Route::get('/fishing/area/all', 'Controllers\VesselInfoReportController@fishingAreaexportPDFAll')->name('fishing.mpdf.area.all');
    Route::get('/fishing/species/all', 'Controllers\VesselInfoReportController@fishingSpeciesexportPDFAll')->name('fishing.mpdf.species.all');
    Route::get('/fishing/port/all', 'Controllers\VesselInfoReportController@fishingPortexportPDFAll')->name('fishing.mpdf.port.all');
    Route::get('/vessel/setup/all', 'Controllers\VesselInfoReportController@vesselSetupexportPDFAll')->name('vessel.mpdf.setup.all');
    Route::get('/vessel/setup/fun', 'Controllers\VesselInfoReportController@document')->name('vessel.mpdf.setup.fun');
    // -----------------------------adv-----------------------------
    Route::get('/vessel/adv', 'Controllers\VesselInfoReportController@adv')->name('vessel.mpdf.adv');
    // Route::get('/fun', [App\Http\Controllers\FunController::class, 'document']);
    // Route::get('vessel-report-pdf/{id?}', 'Pages\VesselReportPdf')->name('vessel_report_pdf');
    Route::get('/fishing/area/{id?}', 'Controllers\VesselInfoReportController@fishingAreaexportPDF')->name('fishing.mpdf.area');
    Route::get('/fishing/species/{id?}', 'Controllers\VesselInfoReportController@fishingSpeciesexportPDF')->name('fishing.mpdf.species');
    Route::get('/fishing/port/{id?}', 'Controllers\VesselInfoReportController@fishingPortexportPDF')->name('fishing.mpdf.port');
    Route::get('/vessel/setup/{id?}', 'Controllers\VesselInfoReportController@vesselSetupexportPDF')->name('vessel.mpdf.setup');
    Route::get('/products/create-pdf/{id?}', 'Controllers\VesselInfoReportController@exportPDF')->name('report.mpdf.index');
    Route::get('/products/view/{id?}', 'Controllers\VesselInfoReportController@exportPDFView')->name('report.mpdf.view');
    Route::get('vessel-report-pdf/{id?}', 'Controllers\VesselInfoReportController@index')->name('vessel_report_pdf');
    Route::get('/fun', 'Controllers\VesselInfoReportController@index')->name('vessel_report_ampdf');
    Route::get('vessel-info-list', 'Pages\VesselInfoList')->name('vessel_info_list');
    Route::get('vessel-info-approved-list', 'Pages\VesselInfoApprovedList')->name('vessel_info_approved_list');
    Route::get('vessel-info-draft-list', 'Pages\VesselInfoDraftList')->name('vessel_info_draft_list');
    Route::get('vessel-info-final-list', 'Pages\VesselInfoFinalList')->name('vessel_info_final_list');
    Route::get('vessel-info-duplicacy-list', 'Pages\VesselInfoDuplicacyList')->name('vessel_info_duplicacy_list');
    Route::get('vessel-info-duplicacy-delete/{id?}', 'Controllers\VesselInfoReportController@faruk')->name('vessel_info_duplicacy_datele');
    // -------------------------pie chart------------------------
    Route::get('/get/donut', 'Controllers\VesselInfoReportController@DoughnutChartOne')->name('vessel_info_dunetchart');
    Route::get('/get/pie', 'Controllers\VesselInfoReportController@pieChart')->name('vessel_info_piechart');
    // -------------------------pie chart end------------------------
    Route::group(['prefix' => '/', 'as' => 'setting.'], function () {
        Route::get('fishing-area-info', 'Pages\Settings\FishingAreaInfos')->name('fishing_area_info');
        Route::get('port-info', 'Pages\Settings\PortInfos')->name('port_info');
        Route::get('fishing-species-info', 'Pages\Settings\FishingSpeciesInfos')->name('fishing_species_info');
        Route::get('vessel-setup-info', 'Pages\Settings\VesselSetupInfos')->name('vessel_setup_info');
    });
    Route::get('datatable', 'Controllers\DatatableController@index')->name('datatable');
});
