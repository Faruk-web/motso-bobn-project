<?php
namespace Modules\VesselInfo\Http\Pages\Settings\Datatable;

use Illuminate\Database\Eloquent\Builder;
use Modules\VesselInfo\Http\Exports\VesselSetupExport;
use Modules\Core\Http\Common\DatatableComponent;
use Modules\VesselInfo\Models\VesselSetupInfo;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\TextFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;

class VesselSetupInfoDatatable extends DataTableComponent
{
    protected $index = 0;
    // public function configure(): void
    // {
    //     $this->setPrimaryKey('id');
    //     $this->setOfflineIndicatorEnabled();
    //     $this->setPerPageAccepted([10, 25, 50, 100, 250, 500]);
    // }

    public function columns(): array
    {
        return [
           Column::make('SN','id')->format(fn () => ++$this->index +  ($this->page - 1) * $this->perPage),
           Column::make('Name', 'name')->searchable()->sortable(),
            Column::make('Description', 'description')->searchable()->sortable(),
            // Column::make('Code', 'code')->searchable()->sortable(),
            Column::make('Date', 'created_at')->searchable()->sortable(),
            Column::make('Updated At', 'updated_at')->searchable()->sortable(),
            Column::make('Status', 'status')->format(
                fn ($value, $row, Column $column) => $value ? "<span class='badge bg-".config('status.vessel_setup_status.'.$value.'.class')." rounded-pill'>".config('status.vessel_setup_status.'.$value.'.name')."</span>" : '-'
            )->html()->sortable(),

            ButtonGroupColumn::make('Actions')
                ->attributes(function ($row) {
                    return [
                        'class' => 'space-x-2',
                    ];
                })
                ->buttons([
                    LinkColumn::make(' Edit')
                        ->title(fn ($row) => ' Edit')
                        ->location(fn ($row) => 'javascript:void(0)')
                        ->attributes(function ($row) {
                            return [
                                'data-id' => $row->id,
                                'data-listener' => 'openVesselSetupInfoModal',
                                'class' => 'btn btn-warning callEvent',
                                'icon' => 'fa fa-edit',
                            ];
                        }),
                        // LinkColumn::make('Print')
                        // ->title(fn ($row) => 'Print')
                        // ->location(fn ($row) =>route('vesselinfo.vessel.mpdf.setup',['id' => $row->id]))
                        // ->attributes(function ($row) {
                        //     return [
                        //         'data-id' => $row->id,
                        //         'data-listener' => '',
                        //         'class' => 'btn btn-primary callEvent',
                        //         'icon' => 'fa fa-print',
                        //     ];
                        // }),
                    // LinkColumn::make(' Delete')
                    //     ->title(fn ($row) => ' Delete')
                    //     ->location(fn ($row) => 'javascript:void(0)')
                    //     ->attributes(function ($row) {
                    //         return [
                    //             'data-id' => $row->id,
                    //             'data-listener' => 'vesselSetupInfo',
                    //             'class' => 'btn btn-danger callEvent fa fa-trash ',
                    //         ];
                    //     }),
                ]),
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
    public function export($format = 'xlsx')
    {
        $this->exportFormat = $format;

        if (count($this->getSelected()) > 0) {
            $headerText = [];

            $headerText = array_merge($headerText, [
                'Outlet : Dhaka',
            ]);

            $export = new VesselSetupExport();
            $export->setTitleText('VesselInfo List');
            $export->setSelectedColumn($this->getExportColumnSelected());
            $export->setColumns($this->getExportColumn());
            $export->setQuery($this->getExportQuery('vessel_infos.id'));
            $export->setHeaderText($headerText);
            return $this->exportDownload($export);
        }
    }

    public function filters(): array
    {
        return [
                SelectFilter::make('Vessel Class')
                ->hiddenFromAll()
                // ->options(VesselSetupInfo::query()->where('type','vcl')->get()->pluck('vessel_name','id')->toArray())
                ->options(filterOption('vesselinfo.status.vessel_setup_infos_type'))
                ->filter(function (Builder $builder, string $value) {
                    $builder->whereLike(['type'], $value);
                }),
                // SelectFilter::make('Vessel Gear')
                // ->hiddenFromAll()
                // ->options(VesselSetupInfo::query()->where('type','ger')->get()->pluck('vessel_name','id')->toArray())
                // ->filter(function (Builder $builder, string $value) {
                //     $builder->whereLike(['id'], $value);
                // }),
                // SelectFilter::make('Navigation Equipment')
                // ->hiddenFromAll()
                // ->options(VesselSetupInfo::query()->where('type','neq')->get()->pluck('vessel_name','id')->toArray())
                // ->filter(function (Builder $builder, string $value) {
                //     $builder->whereLike(['id'], $value);
                // }),
                // SelectFilter::make('vessel type')
                // ->hiddenFromAll()
                // ->options(VesselSetupInfo::query()->where('type','vst')->get()->pluck('vessel_name','id')->toArray())
                // ->filter(function (Builder $builder, string $value) {
                //     $builder->whereLike(['id'], $value);
                // }),
            //     TextFilter::make('From Date')
            //     ->config([
            //         'placeholder' => 'Search Start Date',
            //     ])
            //     ->hiddenFromAll()
            //     ->filter(function (Builder $builder, string $value) {
            //         $builder->whereDate('created_at', '>=', now()->parse($value)->format('Y-m-d'));
            //     }),
            // TextFilter::make('To Date')
            //     ->config([
            //         'placeholder' => 'Search End Date',
            //     ])
            //     ->hiddenFromAll()
            //     ->filter(function (Builder $builder, string $value) {
            //         $builder->whereDate('created_at', '<=', now()->parse($value)->format('Y-m-d'));
            //     }),
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
        return VesselSetupInfo::query(); // Select some things
    }
}
