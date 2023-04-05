<?php

namespace Modules\User\Http\Pages\Settings\Datatable;

use Modules\User\Models\Role;
use Illuminate\Database\Eloquent\Builder;
use Modules\Core\Http\Common\DatatableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\TextFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;

class RoleDatatable extends DataTableComponent
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
            Column::make('Title', 'title')->searchable()->sortable(),
            Column::make('Name', 'name ')->searchable()->sortable(),
            Column::make('Created At', 'created_at ')->searchable()->sortable(),
            Column::make('Updated At', 'updated_at ')->searchable()->sortable(),
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
                                'data-listener' => 'openRoleModal',
                                'class' => 'btn btn-warning callEvent',
                                'icon' => 'fa fa-edit',
                            ];
                        }),
                    LinkColumn::make('Permission')
                        ->title(fn ($row) => 'Permission')
                        ->location(fn ($row) => 'javascript:void(0)')
                        ->attributes(function ($row) {
                            return [
                                'data-id' => $row->id,
                                'data-listener' => 'openRolePermissionModal',
                                'class' => 'btn btn-info callEvent',
                                'icon' => 'fa fa-edit',
                            ];
                        }),
                    LinkColumn::make(' Delete')
                        ->title(fn ($row) => ' Delete')
                        ->location(fn ($row) => 'javascript:void(0)')
                        ->attributes(function ($row) {
                            return [
                                'data-id' => $row->id,
                                'data-listener' => 'roleDelete',
                                'class' => 'btn btn-danger callEvent',
                                'icon' => 'fa fa-trash',
                            ];
                        }),
                ]),
        ];
    }

    public function builder(): Builder
    {

        return Role::select('id')->orderBy('title', 'asc')->where('id','!=',1); // Select some things
    }
}
