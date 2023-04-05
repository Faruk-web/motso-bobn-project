<?php

namespace Modules\Core\Http\Common\LaravelLivewireTables;

use Modules\Core\Http\Common\LaravelLivewireTables\BaseColumnHelpers;
use Rappasoft\LaravelLivewireTables\Views\Column as ColumnBase;
use Rappasoft\LaravelLivewireTables\Views\Traits\Helpers\RelationshipHelpers;
use Rappasoft\LaravelLivewireTables\Views\Traits\Configuration\ColumnConfiguration;

class Column extends ColumnBase
{
    use ColumnConfiguration,
        BaseColumnHelpers,
        RelationshipHelpers;
}
