<?php

namespace Modules\User\Http\Pages\Settings\Datatable;

use Modules\User\Models\Branch;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Modules\Core\Http\Common\DatatableComponent;

use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\TextFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;

class BranchDatatable extends DataTableComponent
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
            // Column::make('Reg Code', 'reg_code')->searchable()->sortable(),
            Column::make('Phone No', 'phone_no')->searchable()->sortable(),
            Column::make('Address', 'address')->searchable()->sortable(),
            Column::make('Email Add', 'email_add')->searchable()->sortable(),
            Column::make('Email Add', 'email_add')->searchable()->sortable(),
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
                        ->title(fn ($row) => ' Edit')
                        ->location(fn ($row) => 'javascript:void(0)')
                        ->attributes(function ($row) {
                            return [
                                'data-id' => $row->id,
                                'data-listener' => 'openBranchModal',
                                'class' => 'btn btn-warning callEvent',
                                'icon' => 'fa fa-edit',
                            ];
                        }),
                    LinkColumn::make(' Delete')
                        ->title(fn ($row) => ' Delete')
                        ->location(fn ($row) => 'javascript:void(0)')
                        ->attributes(function ($row) {
                            return [
                                'data-id' => $row->id,
                                'data-listener' => 'branchDelete',
                                'class' => 'btn btn-danger callEvent',
                                'icon' => 'fa fa-trash',
                            ];
                        }),
                ]),
        ];
    }

    public function builder(): Builder
    {
        $Branch =  Branch::select('id'); // Select some things
        return $Branch;
    }
}
