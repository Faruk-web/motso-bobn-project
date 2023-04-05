<?php

namespace Modules\VesselInfo\Http\Exports;

use App\Models\User;
use Modules\Core\Http\Exports\ExcelExport;
use Maatwebsite\Excel\Concerns\FromQuery;
use Illuminate\Contracts\Queue\ShouldQueue;

class VesselSetupExport extends ExcelExport
{
    public function getColunmMaps($row, $columns): array
    {
        return $columns->map(function ($column) use ($row) {
            if ($this->hasColumnExists($column, 'status')) {
                return  $row->status ? config('status.common.'.$row->status.'.name') : '';
            }
            return $this->columnRender($column, $row);
        })->toArray();
    }
}
