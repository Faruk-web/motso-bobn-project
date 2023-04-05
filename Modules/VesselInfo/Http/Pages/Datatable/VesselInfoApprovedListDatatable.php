<?php

namespace Modules\VesselInfo\Http\Pages\Datatable;

use Modules\VesselInfo\Models\VesselInfo;
use Illuminate\Database\Eloquent\Builder;

use Modules\Core\Http\Common\DatatableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\TextFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;

class VesselInfoApprovedListDatatable extends DataTableComponent
{
    protected $index = 0;
    public function configure(): void
    {
        $this->setPrimaryKey('SN','id');
        $this->setOfflineIndicatorEnabled();
        $this->setPerPageAccepted([10, 25, 50, 100, 250, 500]);
    }

    public function columns(): array
    {
        return [
           Column::make('id')->format(fn () => ++$this->index +  ($this->page - 1) * $this->perPage),
           Column::make('Vessel Name', 'name')->searchable()->sortable(),
           Column::make('Vessel ID', 'old_vessel_index_id')->searchable()->sortable()->collapseOnMobile(),
           Column::make('Skippers Name', 'skipper_name')->searchable()->sortable()->collapseOnMobile(),
           Column::make('Place Built', 'place_built')->searchable()->deselected()->sortable()->collapseOnMobile(),
           Column::make('License No', 'fishing_license_no')->searchable()->sortable()->collapseOnMobile(),
           Column::make('Engine No', 'engine_no')->searchable()->sortable()->collapseOnMobile(),
           Column::make('Update Date', 'created_at')->searchable()->sortable()->collapseOnMobile(),
           Column::make('Fishing License', 'fishing_license')->searchable()->deselected()->sortable()->collapseOnMobile(),
           Column::make('Fishing License No', 'fishing_license_no')->searchable()->deselected()->sortable()->collapseOnMobile(),
           Column::make('License First Issue Date', 'license_first_issue_date')->searchable()->deselected()->sortable()->collapseOnMobile(),
           Column::make('Fishing License Image ID', 'fishing_license_image_id')->searchable()->deselected()->sortable()->collapseOnMobile(),
           Column::make('Fishing Permit No', 'fishing_permit_no')->searchable()->deselected()->sortable()->collapseOnMobile(),
           Column::make('Permit First Issue Date', 'permit_first_issue_date')->searchable()->deselected()->sortable()->collapseOnMobile(),
           Column::make('Seaworthiness Certificate', 'seaworthiness_certificate')->searchable()->deselected()->sortable()->collapseOnMobile(),
           Column::make('Seawortthiness Cert Issue Date', 'seawortthiness_cert_issue_date')->searchable()->deselected()->sortable()->collapseOnMobile(),
           Column::make('Insurance Status ID', 'insurance_status_id')->searchable()->deselected()->sortable()->collapseOnMobile(),
           Column::make('Pwnership Type', 'ownership_type')->searchable()->deselected()->sortable()->collapseOnMobile(),
           Column::make('Number Of Owners', 'number_of_owners')->searchable()->deselected()->sortable()->collapseOnMobile(),
           Column::make('Year Built', 'year_built')->searchable()->deselected()->sortable()->collapseOnMobile(),
           Column::make('Length Of Vessel', 'length_of_vessel')->searchable()->deselected()->sortable()->collapseOnMobile(),
           Column::make('Width Of Vessel', 'width_of_vessel')->searchable()->deselected()->sortable()->collapseOnMobile(),
           Column::make('Depth Of Vessel', 'depth_of_vessel')->searchable()->deselected()->sortable()->collapseOnMobile(),
           Column::make('Gross Tonnage', 'gross_tonnage')->searchable()->deselected()->sortable()->collapseOnMobile(),
           Column::make('Net Tonnage', 'net_tonnage')->searchable()->deselected()->sortable()->collapseOnMobile(),
           Column::make('Other Multi Color', 'other_multi_color_desc')->searchable()->deselected()->sortable()->collapseOnMobile(),
           Column::make('Engine No', 'engine_no')->searchable()->deselected()->sortable()->collapseOnMobile(),
           Column::make('Engine Power', 'engine_power')->searchable()->deselected()->sortable()->collapseOnMobile(),
           Column::make('Onboard Mobile Number', 'onboard_mobile_number')->searchable()->deselected()->sortable()->collapseOnMobile(),
           Column::make('Skipper Name', 'skipper_name')->searchable()->deselected()->sortable()->collapseOnMobile(),
           Column::make('Skipper_NID', 'skipper_nid')->searchable()->deselected()->sortable()->collapseOnMobile(),
           Column::make('Number Of Skipper Majhi', 'number_of_skipper_majhi')->searchable()->deselected()->sortable()->collapseOnMobile(),
           Column::make('Number Of Engine Crew', 'number_of_engine_crew')->searchable()->deselected()->sortable()->collapseOnMobile(),
           Column::make('Number Of Fishers Deckhand', 'number_of_fishers_deckhand')->searchable()->deselected()->sortable()->collapseOnMobile(),
           Column::make('Number Of Other Crew', 'number_of_other_crew')->searchable()->deselected()->sortable()->collapseOnMobile(),
           Column::make('Trip Duration', 'trip_duration')->searchable()->deselected()->sortable()->collapseOnMobile(),
           Column::make('Trips Per Year', 'trips_per_year')->searchable()->deselected()->sortable()->collapseOnMobile(),
           Column::make('Fishing Days Per Year', 'fishing_days_per_year')->searchable()->deselected()->sortable()->collapseOnMobile(),
           Column::make('Avg Cost Per Trip', 'avg_cost_per_trip')->searchable()->deselected()->sortable()->collapseOnMobile(),
           Column::make('Fishing Days Per Year', 'fishing_days_per_year')->searchable()->deselected()->sortable()->collapseOnMobile(),
           Column::make('Min Fishing Depth', 'min_fishing_depth')->searchable()->deselected()->sortable()->collapseOnMobile(),
           Column::make('Max Fishing Depth', 'max_fishing_depth')->searchable()->deselected()->sortable()->collapseOnMobile(),
           Column::make('Survey Location Latitude', 'survey_location_latitude')->searchable()->deselected()->sortable()->collapseOnMobile(),
           Column::make('Survey Location Longitude', 'survey_location_longitude')->searchable()->deselected()->sortable()->collapseOnMobile(),
           Column::make('Survey Location Altitude', 'survey_location_altitude')->searchable()->deselected()->sortable()->collapseOnMobile(),
           Column::make('Survey Location Precision', 'survey_location_precision')->searchable()->deselected()->sortable()->collapseOnMobile(),
           Column::make('Google Map Loc', 'google_map_loc')->searchable()->deselected()->sortable()->collapseOnMobile(),
            Column::make('Status', 'status')->format(
                fn ($value, $row, Column $column) => $value ? "<span class='badge bg-".config('status.vessel_status.'.$value.'.class')." rounded-pill'>".config('status.vessel_status.'.$value.'.name')."</span>" : '-'
            )->html()->sortable(),
            

            ButtonGroupColumn::make('Actions')
                ->attributes(function ($row) {
                    return [
                        'class' => 'space-x-2',
                    ];
                })
                // ->buttons([
                //     LinkColumn::make(' Edit')
                //         ->title(fn ($row) => 'Panding')
                //         ->location(fn ($row) => 'javascript:void(0)')
                //         ->attributes(function ($row) {
                //             return [
                //                 'data-id' => $row->id,
                //                 'data-listener' => 'openVesselInfoApprovedModal',
                //                 'class' => 'btn btn-warning callEvent',
                //                 'icon' => 'fa fa-edit',
                //             ];
                //         }),
                //     ])
                ->buttons([
                    LinkColumn::make('View')
                    ->title(fn ($row) => '')
                    ->location(fn ($row) =>route('vesselinfo.report.mpdf.view', ['id' => $row->id]))
                    ->attributes(function ($row) {
                        return [
                            'data-id' => $row->id,
                            'data-listener' => 'openVesselInfoListModal',
                            'class' => 'btn btn-info callEvent ',
                            'icon' => 'fa fa-eye',
                        ];
                }),
                    LinkColumn::make('Print Details')
                    ->title(fn ($row) => '')
                    ->location(fn ($row) =>route('vesselinfo.report.mpdf.index',['id' => $row->id]))
                    ->attributes(function ($row) {
                        return [
                            'data-id' => $row->id,
                            'data-listener' => 'openVesselInfoListModal',
                            'class' => 'btn btn-primary callEvent ',
                            'icon' => 'fa fa-print',
                        ];
                    }),
                ]),
                
                
        ];
    }

    public function builder(): Builder
    {
        // $id = auth()->user()->id;
        // return VesselInfo::where('status','1'); // Select some things
        // $id = auth()->user()->branch_id;
        // return VesselInfo::with('OfficeInfo')->where('status','1')->where('branch_id',$id); 

        $offfice_id = auth()->user()->branch_id;
        $auth_name = auth()->user()->name;
        if($auth_name== "Super Admin"){
            return VesselInfo::where('status','1');
        }else{
            return VesselInfo::where('status','1')->where('user_id',auth()->user()->id)->orderBy('name', 'asc'); // Select some things
        }

    }
}
