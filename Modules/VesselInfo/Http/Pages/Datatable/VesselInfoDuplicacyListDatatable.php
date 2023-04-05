<?php

namespace Modules\VesselInfo\Http\Pages\Datatable;

use Modules\VesselInfo\Models\VesselInfo;
use Modules\VesselInfo\Models\VesselSetupInfo;
use Modules\VesselInfo\Models\VesselOwnerInfo;
use Modules\VesselInfo\Models\VesselWiseEquipmentInfo;
use Modules\VesselInfo\Models\FishingSpeciesInfo;
use Modules\User\Models\Branch;
use Illuminate\Database\Eloquent\Builder;
use Modules\VesselInfo\Http\Exports\VesselInfoExport;
use Modules\Core\Http\Common\DatatableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\TextFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\MultiSelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;

class VesselInfoDuplicacyListDatatable extends DataTableComponent
{
    protected $index = 0;
    public function columns(): array
    {
        return [
           Column::make('SN', 'id')->format(fn () => ++$this->index +  ($this->page - 1) * $this->perPage),
        //    Column::make('User Name', 'User.name')->searchable()->sortable(),
           Column::make('Provisional ID', 'provisional_vessel_id')->searchable()->sortable(),
           Column::make('Vessel Name', 'name')->searchable()->sortable(),
           Column::make('Update Date', 'created_at')->searchable()->sortable(),
           Column::make('Skippers Name', 'skipper_name')->searchable()->sortable()->collapseOnMobile(),
           Column::make('Place Built', 'place_built')->searchable()->deselected()->sortable()->collapseOnMobile(),
        //    -----------------------------------
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
            )->html()->sortable()->collapseOnMobile(),
        ButtonGroupColumn::make('Actions')
            ->attributes(function ($row) {
                return [
                    'class' => 'space-x-2',
                ];
            })
            ->buttons([
                LinkColumn::make(' Edit')
                ->title(fn ($row) => '')
                ->location(fn ($row) => route('vesselinfo.motorized_craft',['id' => $row->id]))
                ->attributes(function ($row) {
                    return [
                        'data-id' => $row->id,
                        'data-listener' => 'openVesselInfoListModal',
                        'class' => 'btn btn-warning callEvent ',
                        'icon' => 'fa fa-edit',
                    ];
                }),
                LinkColumn::make('Print')
                ->title(fn ($row) => '')
                ->location(fn ($row) =>route('vesselinfo.report.mpdf.index', ['id' => $row->id]))
                ->attributes(function ($row) {
                    return [
                        'data-id' => $row->id,
                        'data-listener' => 'openVesselInfoListModal',
                        'class' => 'btn btn-primary callEvent ',
                        'icon' => 'fa fa-print',
                    ];
                }),
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
            ])->excludeFromColumnSelect(),
        ];
    }
    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setOfflineIndicatorEnabled();
        $this->setPerPageAccepted([10, 25, 50, 100, 250, 500]);
        $this->setConfigurableAreas([
            'before-toolbar' => 'components.custom-filters',
            'toolbar-left-end' => 'components.custom-filters-button',
        ]);
        $this->setFilterLayoutSlideDown();
        $this->setSortingPillsStatus(false);
    }

   public function bulkActions(): array
   {
       return [
           'export' => 'Excel',
           'export("pdf")' => 'PDF',
       ];
   }

    public function exportConfigure(): void
    {
        $exportHeaders = [];
        // $exportHeaders = array_merge($exportHeaders, [
        //     'Outlet : ',
        // ]);

        $this->setExportHeaders($exportHeaders);
        $this->setExportTitle('Menu List');
        // $this->setExportOrientation('landscape');
        // $this->setExportPaperSize(13);
    }

    public function filters(): array
    {
        $vesselSetupVcl = VesselSetupInfo::query()->where('type', 'vcl')->get()->pluck('name', 'id');
        $FishingSpeciesInfoFilter = FishingSpeciesInfo::query()->get()->pluck('name', 'id');
        $VesselSetupInfoger = VesselSetupInfo::query()->where('type', 'ger')->get()->pluck('name', 'id');
        $VesselSetupInfoneq = VesselSetupInfo::query()->where('type', 'neq')->get()->pluck('name', 'id');
        $VesselSetupInfovst = VesselSetupInfo::query()->where('type', 'vst')->get()->pluck('name', 'id');
        $Branchinfo = Branch::query()->get()->pluck('name', 'id');
        return [
                SelectFilter::make('Vessel Class')
                ->hiddenFromAll()
                ->options(addAllField($vesselSetupVcl))
                ->filter(function (Builder $builder, string $value) {
                    $builder->whereLike(['VesselSetupInfo.id'], $value);
                }),
                SelectFilter::make('Vessel Gear')
                ->hiddenFromAll()
                // ->options(VesselSetupInfo::query()->where('type', 'ger')->get()->pluck('name', 'id')->toArray())
                ->options(addAllField($VesselSetupInfoger))
                ->filter(function (Builder $builder, string $value) {
                    $builder->whereLike(['VesselSetupInfo.id'], $value);
                }),
                SelectFilter::make('Navigation Equipment')
                ->hiddenFromAll()
                // ->options(VesselSetupInfo::query()->where('type', 'neq')->get()->pluck('name', 'id')->toArray())
                ->options(addAllField($VesselSetupInfoneq))
                ->filter(function (Builder $builder, string $value) {
                    $builder->whereLike(['VesselSetupInfo.id'], $value);
                }),
                SelectFilter::make('vessel type')
                ->hiddenFromAll()
                // ->options(VesselSetupInfo::query()->where('type', 'vst')->get()->pluck('name', 'id')->toArray())
                ->options(addAllField($VesselSetupInfovst))
                ->filter(function (Builder $builder, string $value) {
                    $builder->whereLike(['VesselSetupInfo.id'], $value);
                }),
                SelectFilter::make('Vessel Wise Fishing Species')
                ->hiddenFromAll()
                ->options(addAllField($FishingSpeciesInfoFilter))
                ->filter(function (Builder $builder, string $value) {
                    $builder->whereLike(['VesselWiseFishingSpeciesInfo.FishingSpeciesInfo.id'], $value);
                }),
                SelectFilter::make('Select Office Name')
                ->hiddenFromAll()
                // ->options(Branch::query()->get()->pluck('name', 'id')->toArray())
                ->options(addAllField($Branchinfo))
                ->filter(function (Builder $builder, string $value) {
                    $builder->whereLike(['OfficeInfo.id'], $value);
                }),
                TextFilter::make('From Date')
                ->config([
                    'placeholder' => 'Search Start Date',
                ])
                ->hiddenFromAll()
                ->filter(function (Builder $builder, string $value) {
                    $builder->whereDate('created_at', '>=', now()->parse($value)->format('Y-m-d'));
                }),
            TextFilter::make('To Date')
                ->config([
                    'placeholder' => 'Search End Date',
                ])
                ->hiddenFromAll()
                ->filter(function (Builder $builder, string $value) {
                    $builder->whereDate('created_at', '<=', now()->parse($value)->format('Y-m-d'));
                }),
                SelectFilter::make('Vessel Status')
                ->hiddenFromAll()
                ->options(filterOption('status.common'))
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('status', $value);
                }),
        ];
    }

    public function builder(): Builder
    {
        $id = auth()->user()->id;
        return VesselInfo::with('User')->where('archive_data','Y')->orderBy('name', 'asc'); // Select some things
    }
}
