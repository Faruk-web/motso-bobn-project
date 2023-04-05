<?php

namespace Modules\Core\Http\Common;

use Mpdf\Tag\Dd;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\Http\Common\LaravelLivewireTables\ExcelExport;
use Rappasoft\LaravelLivewireTables\DataTableComponent as BaseDataTableComponent;

abstract class DatatableComponent extends BaseDataTableComponent
{
    public $exportTitle;
    public $exportHeaders = [];
    public $exportPaperSize;
    public $exportOrientation;
    public $exportFileName;

    /**
    * 8 = A3 paper (297 mm by 420 mm)
    * 9 = A4 paper (210 mm by 297 mm)
    * 10 = A4 small paper (210 mm by 297 mm)
    * 11 = A5 paper (148 mm by 210 mm)
    * 12 = B4 paper (250 mm by 353 mm)
    * 13 = B5 paper (176 mm by 250 mm).
    *
    *  orientation = default / landscape / portrait.
    **/

    protected $listeners = [
       'refreshDatatable' => '$refresh',
       'setSort' => 'setSortEvent',
       'clearSorts' => 'clearSortEvent',
       'setFilter' => 'setFilterEvent',
       'clearFilters' => 'clearFilterEvent',
       'clearDatatable' => 'clearDatatable',
    ];

    public function clearDatatable()
    {
        $this->dispatchBrowserEvent('typeahead_reset');
        $this->clearFilterEvent();
        $this->clearSorts();
        $this->clearSearch();
    }


    public function export($format = 'xlsx')
    {
        $this->exportConfigure();

        if ($format == 'pdf') {
            $formarLoader = \Maatwebsite\Excel\Excel::MPDF;
        } else {
            $formarLoader = \Maatwebsite\Excel\Excel::XLSX;
        }

        $class = new ExcelExport();
        $class->setTitleText($this->exportTitle);
        $class->setQuery($this->getExportQuery($this->getPrimaryKey()));
        $class->setHeaderText($this->exportHeaders);
        $class->setPaperSize($this->exportPaperSize);
        $class->setOrientation($this->exportOrientation);
        $class->setColumns($this->getExportColumn());
        $class->setQuery($this->getExportQuery($this->getPrimaryKey()));

        if (!$this->exportFileName && $this->exportTitle) {
            $this->exportFileName = Str::kebab($this->exportTitle);
        } elseif (!$this->exportFileName && $this->getTableName()) {
            $this->exportFileName = Str::kebab($this->getTableName());
        }

        return Excel::download($class, $this->exportFileName.'-'.now()->format('d-m-y-h-i').'.'.$format, $formarLoader);
    }

    public function getExportColumn($blockColumn = [])
    {
        if (count($blockColumn) <= 0) {
            $blockColumn = ['Actions'];
        }

        return $this->getColumns()->filter(function ($column) use ($blockColumn) {
            if ($this->columnSelectIsEnabledForColumn($column) && in_array($column->getTitle(), $blockColumn)) {
                return false;
            } elseif ($this->columnSelectIsEnabledForColumn($column)) {
                return true;
            }
            return false;
        });
    }

    public function getExportQuery($column, $limit = null)
    {
        $query = clone $this->getBuilder();

        if (count($this->getSelected()) > 0) {
            $query->whereIn($column, $this->getSelected());
        } elseif ($limit) {
            $query->limit($limit);
        }
        return $query;
    }

    public function getExportColumnSelected()
    {
        return $this->getSelected();
    }

    public function exportConfigure()
    {
        //
    }

    public function setExportTitle($title)
    {
        $this->exportTitle = $title;
        return $this;
    }

    public function setExportHeaders($headers = [])
    {
        $this->exportHeaders = $headers;
        return $this;
    }

    public function setExportPaperSize($paperSize = 9)
    {
        $this->exportPaperSize = $paperSize;
        return $this;
    }

    public function setExportOrientation($orientation = 'default')
    {
        $this->exportOrientation = $orientation;
        return $this;
    }

    public function setExportFileName($fileName = null)
    {
        $this->exportFileName = $fileName;
        return $this;
    }
}
