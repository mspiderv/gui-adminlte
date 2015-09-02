<?php

namespace Vitlabs\GUIAdminLTE\Elements;

use Illuminate\Support\Facades\App;
use Vitlabs\GUIAdmin\Contracts\Elements\TableContract;
use Vitlabs\GUICore\Traits\AttributesTrait;
use Vitlabs\GUICore\Traits\DataTrait;

class Table extends Element implements TableContract {

    use AttributesTrait, DataTrait;

    /* Attributes */
    protected $columns = [];
    protected $rows = [];

    public function __construct()
    {
        $this->addClass('table table-bordered table-hover datatable');
        $this->setDefault('sortable', false);
        $this->setAttribute('data-paging', $this->config('table.paging'));
    }

    public function needResources()
    {
        return [

            'css' => [

                // DATA TABLES
                '~adminlte/plugins/datatables/dataTables.bootstrap.css',

                // Custom styles
                '~custom/css/tables.css',

            ],

            'js' => [

                // Custom JS
                '~custom/js/tables.js',

                // DATA TABES SCRIPT
                '~adminlte/plugins/datatables/jquery.dataTables.min.js',
                '~adminlte/plugins/datatables/dataTables.bootstrap.min.js',

                // Custom JS
                '~custom/js/jquery-ui-sortable.min.js',

            ],

            'config' => [
                'gui-adminlte.table.sortURL' => 'table.sortURL'
            ],

        ];
    }

    public function sortable($sortable = null)
    {
        return $this->getOrSet('sortable', $sortable);
    }

    public function paging($paging = null)
    {
        return $this->getOrSetAttribute('data-paging', $paging);
    }

    /* Cols */
    public function getColumns()
    {
        return $this->columns;
    }

    public function addColumn($column)
    {
        $this->columns[] = $column;

        return $this;
    }

    public function addColumns(array $columns)
    {
        $this->columns = array_merge($this->columns, $columns);

        return $this;
    }

    public function removeColumn($column)
    {
        $this->columns = array_diff($this->columns, [$column]);

        return $this;
    }

    public function removeColumns(array $columns)
    {
        $this->columns = array_diff($this->columns, $columns);

        return $this;
    }

    public function clearColumns()
    {
        $this->columns = [];

        return $this;
    }

    public function countColumns()
    {
        return count($this->columns);
    }

    /* Rows */
    public function addRows($rows)
    {
        foreach ($rows as $row)
        {
            $this->addRow($row);
        }

        return $this;
    }

    public function addRow($rowData)
    {
        $row = $this->createRow($rowData);

        $this->rows[] = $row;

        return $row;
    }

    public function getRows()
    {
        return $this->rows;
    }

    public function clearRows()
    {
        $this->rows = [];

        return $this;
    }

    public function countRows()
    {
        return count($this->rows);
    }

    protected function createRow($data)
    {
        return App::make('Vitlabs\GUIAdmin\Contracts\Elements\TableRowContract', [$data, $this]);
    }

    /* Other */
    public function count()
    {
        return $this->countRows();
    }

    public function render()
    {
        if ($this->get('sortable'))
        {
            $this->addClass('datatable-sorting');
        }
        else
        {
            $this->removeClass('datatable-sorting');
        }

        $data = [];
        $data['attrs'] = $this->parseAttributes();
        $data['columns'] = $this->columns;
        $data['rows'] = $this->renderRows($this->rows);

        return $this->renderView('table', $data);
    }

    protected function renderRows(array $rows)
    {
        $result = '';

        foreach ($rows as $row)
        {
            $result .= $row->render();
        }

        return $result;
    }

    public function clear()
    {
        $this->clearColumns();
        $this->clearRows();

        return $this;
    }

}
