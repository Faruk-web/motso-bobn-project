<?php

namespace Modules\VesselInfo\Http\Pages\Datatable;
use Illuminate\Support\Facades\Auth;
use Modules\VesselInfo\Models\VesselInfo;
use Illuminate\Database\Eloquent\Builder;

use Modules\Core\Http\Common\DatatableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\TextFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;

class VesselInfoDraftListDatatable extends DataTableComponent
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
           Column::make('Provisional ID', 'provisional_vessel_id')->searchable()->sortable(),
           Column::make('Vessel ID', 'old_vessel_index_id')->searchable()->sortable()->collapseOnMobile(),
           Column::make('Vessel Name', 'name')->searchable()->sortable(),
        //    Column::make('office Name', 'OfficeInfo.name')->searchable()->sortable(),
           Column::make('Update Date', 'created_at')->searchable()->sortable(),
           Column::make('Skippers Name', 'skipper_name')->searchable()->sortable()->collapseOnMobile(),
           Column::make('Place Built', 'place_built')->searchable()->sortable()->collapseOnMobile(),
        //    Column::make('License No', 'fishing_license_no')->searchable()->sortable()->collapseOnMobile(),
           Column::make('Engine No', 'engine_no')->searchable()->sortable()->collapseOnMobile(),
            Column::make('Status', 'status')->format(
                fn ($value, $row, Column $column) => $value ? "<span class='badge bg-".config('status.vessel_status.'.$value.'.class')." rounded-pill'>".config('status.vessel_status.'.$value.'.name')."</span>" : '-'
            )->html()->sortable(),
            

            ButtonGroupColumn::make('Actions')
                ->attributes(function ($row) {
                    return [
                        'class' => 'space-x-2',
                    ];
                })
                ->buttons([
                    LinkColumn::make('Edit')
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
                        // LinkColumn::make('View')
                        // ->title(fn ($row) => '')
                        // ->location(fn ($row) =>route('vesselinfo.report.mpdf.view', ['id' => $row->id]))
                        // ->attributes(function ($row) {
                        //     return [
                        //         'data-id' => $row->id,
                        //         'data-listener' => 'openVesselInfoListModal',
                        //         'class' => 'btn btn-info callEvent ',
                        //         'icon' => 'fa fa-eye',
                        //     ];
                        // }),
                        // LinkColumn::make(' Print')
                        // ->title(fn ($row) => '')
                        // ->location(fn ($row) => route('vesselinfo.report.mpdf.index',['id' => $row->id]))
                        // ->attributes(function ($row) {
                        //     return [
                        //         'data-id' => $row->id,
                        //         'data-listener' => 'openVesselInfoListModal',
                        //         'class' => 'btn btn-primary callEvent ',
                        //         'icon' => 'fa fa-print',
                        //     ];
                        // }),
               
                ]),
        ];
    }

    public function builder(): Builder
    {
        // $id = auth()->user()->branch_id;
        // $id = auth()->user()->name;
        // if($id== "Super Admin"){
        //     return VesselInfo::where('status','0');
        // }else{
        //     return VesselInfo::where('status','0')->where('user_id',auth()->user()->id); // Select some things
        // }

        $offfice_id = auth()->user()->branch_id;
        $auth_name = auth()->user()->name;
        if($auth_name== "Super Admin"){
            return VesselInfo::where('status','0');
        }else{
            return VesselInfo::where('status','0')->where('user_id',auth()->user()->id)->orderBy('name', 'asc'); // Select some things
        }
        
    }
}
