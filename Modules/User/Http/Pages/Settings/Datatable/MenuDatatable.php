<?php

namespace Modules\User\Http\Pages\Settings\Datatable;

use Modules\User\Models\Menu;
use Illuminate\Database\Eloquent\Builder;
use Modules\Core\Http\Common\DatatableComponent;
use Modules\Core\Http\Common\LaravelLivewireTables\Column;
use Modules\Core\Http\Common\LaravelLivewireTables\LinkColumn;
use Modules\Core\Http\Common\LaravelLivewireTables\TextFilter;
use Modules\Core\Http\Common\LaravelLivewireTables\SelectFilter;
use Modules\Core\Http\Common\LaravelLivewireTables\BooleanColumn;
use Modules\Core\Http\Common\LaravelLivewireTables\ButtonGroupColumn;

class MenuDatatable extends DataTableComponent
{
    public string $tableName = 'menus';

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
        $this->setEagerLoadAllRelationsStatus(true);
        // $this->setAdditionalSelects(['menus.module_id']);
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
        return [
            TextFilter::make('Start Date')
                ->config([
                    'placeholder' => 'Search Start Date',
                ])
                ->hiddenFromAll()
                ->filter(function (Builder $builder, string $value) {
                    $builder->whereDate('created_at', '>=', now()->parse($value)->format('Y-m-d'));
                }),
            TextFilter::make('End Date')
                ->config([
                    'placeholder' => 'Search End Date',
                ])
                ->hiddenFromAll()
                ->filter(function (Builder $builder, string $value) {
                    $builder->whereDate('created_at', '<=', now()->parse($value)->format('Y-m-d'));
                }),
            TextFilter::make('District')
                ->config([
                    'placeholder' => 'Search District',
                ])
                ->hiddenFromAll()
                ->filter(function (Builder $builder, string $value) {
                    // $builder->where('agents.division_id', $value);
                }),
            TextFilter::make('Module Name')
                ->config([
                    'placeholder' => 'Search Module Name',
                ])
                ->hiddenFromAll()
                ->filter(function (Builder $builder, string $value) {
                    $builder->whereLike(['Module.name'], $value);
                    // $builder->whereHas('Module', function (Builder $query) use ($value) {
                    //     $query->where('name', 'like', '%'.$value.'%');
                    // });
                }),
            SelectFilter::make('Status')
                ->hiddenFromAll()
                ->options(filterOption('status.common'))
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('status', $value);
                }),
        ];
    }

    public function columns(): array
    {
        return [
            Column::make("SN", "id"),
            Column::make('Icon', 'icon')->sortable(),
            Column::make('Name', 'name')->searchable()->sortable(),
            Column::make('Module', 'Module.name')->eagerLoadRelations()->searchable()->sortable(),
            // Column::make('Parent Menu', 'parent_id')->searchable()->sortable(),
            // Column::make('Parent Menu', 'SingleParent.name')->eagerLoadRelations()->sortable(),
            Column::make('Status', 'status')->format(
                fn ($value, $row, Column $column) => $value ? "<span class='badge bg-".config('status.common.'.$value.'.class')." rounded-pill'>".config('status.common.'.$value.'.name')."</span>" : '-'
            )->html()->sortable(),
            ButtonGroupColumn::make('Actions')
                ->attributes(function ($row) {
                    return [
                        'class' => 'space-x-2',
                    ];
                })
                ->buttons([
                    LinkColumn::make(' Edit')
                        ->title(fn ($row) => 'Edit')
                        ->location(fn ($row) => 'javascript:void(0)')
                        ->attributes(function ($row) {
                            return [
                                'data-id' => $row->id,
                                'data-listener' => 'openMenuModal',
                                'class' => 'btn btn-warning callEvent ',
                                'icon' => 'fa fa-edit',
                            ];
                        }),
                    LinkColumn::make(' Delete')
                        ->title(fn ($row) => ' Delete')
                        ->location(fn ($row) => 'javascript:void(0)')
                        ->attributes(function ($row) {
                            return [
                                'data-id' => $row->id,
                                'data-listener' => 'menuDelete',
                                'class' => 'btn btn-danger callEvent ',
                                'icon' => 'fa fa-trash',
                            ];
                        }),
                ]),
        ];
    }

    public function builder(): Builder
    {
        return Menu::query(); // Select some things
    }
}
