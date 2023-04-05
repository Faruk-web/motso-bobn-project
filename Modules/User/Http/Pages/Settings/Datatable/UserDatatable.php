<?php

namespace Modules\User\Http\Pages\Settings\Datatable;

use Modules\User\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Modules\Core\Http\Common\DatatableComponent;

use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\TextFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;

class UserDatatable extends DataTableComponent
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
            Column::make('Port code', 'user_code')->sortable(),
            Column::make('Branch Name', 'Branch.name')->searchable()->sortable(),
            Column::make('Name', 'name')->searchable()->sortable(),
            Column::make('Email', 'email')->searchable()->sortable(),
            Column::make('Mobile', 'mobile')->searchable()->sortable(),
            Column::make('Date', 'created_at')->searchable()->sortable(),

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
                                'data-listener' => 'openUserModal',
                                'class' => 'btn btn-warning callEvent' . (ucan('user.update', 'User') ? '' : 'd-none'),
                                'icon' => 'fa fa-edit',
                            ];
                        }),
                    LinkColumn::make(' Delete')
                        ->title(fn ($row) => ' Delete')
                        ->location(fn ($row) => 'javascript:void(0)')
                        ->attributes(function ($row) {
                            return [
                                'data-id' => $row->id,
                                'data-listener' => 'userDelete',
                                'class' => 'btn btn-danger callEvent' .(ucan('user.delete', 'User') ? '' : 'd-none'),
                                'icon' => 'fa fa-trash',
                            ];
                        }),
                ])->hideIf(!ucan('user.update|user.delete', 'User')),
        ];
    }

    public function builder(): Builder
    {
        return User::with('Branch')->where('email','!=','superadmin@leotechapp')->orderBy('name', 'asc'); // Select some things
    }
}
