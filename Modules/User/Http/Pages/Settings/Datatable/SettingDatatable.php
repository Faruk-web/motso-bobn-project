<?php

namespace Modules\User\Http\Pages\Settings\Datatable;

use Modules\User\Models\SoftwareSetting;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Modules\Core\Http\Common\DatatableComponent;

use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\TextFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;

class SettingDatatable extends DataTableComponent
{
    protected $index = 0;
    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setOfflineIndicatorEnabled();
        $this->setPerPageAccepted([10, 25, 50, 100, 250, 500]);
    }

    public function columns(): array
    {
        return [
            Column::make('SN','id')->format(fn () => ++$this->index +  ($this->page - 1) * $this->perPage),
            Column::make('Name', 'name')->searchable()->sortable(),
            Column::make('Path', 'path')->searchable()->sortable(),
            Column::make('Alias', 'alias')->searchable()->sortable(),
            Column::make('Description', 'description')->searchable()->sortable(),
            Column::make('Keywords', 'keywords')->searchable()->sortable(),
            Column::make('Providers', 'providers')->searchable()->sortable(),
            // Column::make('Files', 'files')->searchable()->sortable(),

            ButtonGroupColumn::make('Actions')
                ->attributes(function ($row) {
                    return [
                        'class' => 'space-x-2',
                    ];
                })
                ->buttons([
                    LinkColumn::make('Edit')
                        ->title(fn ($row) => 'Edit')
                        ->location(fn ($row) => 'javascript:void(0)')
                        ->attributes(function ($row) {
                            return [
                                'data-id' => $row->id,
                                'data-listener' => 'openModuleModal',
                                'class' => 'btn btn-warning btn-sm callEvent',
                                'icon' => 'fa fa-edit',
                            ];
                        }),
                    LinkColumn::make('Delete')
                        ->title(fn ($row) => 'Delete')
                        ->location(fn ($row) => 'javascript:void(0)')
                        ->attributes(function ($row) {
                            return [
                                'data-id' => $row->id,
                                'data-listener' => 'moduleDelete',
                                'class' => 'btn btn-danger btn-sm callEvent',
                                'icon' => 'fa fa-trash',
                            ];
                        }),
                ]),
        ];
    }

    public function builder(): Builder
    {
        return SoftwareSetting::select('id'); // Select some things
    }
}
