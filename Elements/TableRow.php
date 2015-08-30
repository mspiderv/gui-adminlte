<?php

namespace Vitlabs\GUIAdminLTE\Elements;

use Vitlabs\GUIAdmin\Contracts\Elements\TableContract;
use Vitlabs\GUIAdmin\Contracts\Elements\TableRowContract;
use Vitlabs\GUICore\Traits\AttributesTrait;

class TableRow extends Element implements TableRowContract {

    use AttributesTrait;

    protected $table;
    protected $cells = [];

    public function __construct($data, TableContract $table)
    {
        $this->table = $table;
        $this->cells = $data;

        $this->setAttribute('data-level', 0);
        $this->setAttribute('data-sortgroup', null);
        $this->setAttribute('data-model', null);
        $this->setAttribute('data-id', '0');
    }

    public function id($id = null)
    {
        return $this->getOrSetAttribute('data-id', $id);
    }

    public function level($level = null)
    {
        return $this->getOrSetAttribute('data-level', $level);
    }

    public function sortgroup($sortgroup = null)
    {
        return $this->getOrSetAttribute('data-sortgroup', $sortgroup);
    }

    public function model($model = null)
    {
        return $this->getOrSetAttribute('data-model', $model);
    }

    public function render()
    {
        $data = [];
        $data['cells'] = $this->cells;

        // We dont need some attributes if its sortable
        if ($this->table->sortable())
        {
            $this->removeAttribute('data-id');
            $this->removeAttribute('data-sortgroup');
            $this->removeAttribute('data-model');
            $this->removeAttribute('data-model');
        }

        $data['attrs'] = $this->parseAttributes();

        // Append some HTML
        if (isset($data['cells'][0]))
        {
            // Add level HTML
            for ($i = intval($this->level()); $i > 0; $i--)
            {
                $data['cells'][0] = config('gui-adminlte.table.rowLevel') . $data['cells'][0];
            }

            // Add handle HTML
            if ($this->table->sortable() == false && $this->sortgroup() != null && $this->model() != null)
            {
                $data['cells'][0] = config('gui-adminlte.table.rowHandle') . $data['cells'][0];
            }
        }

        return $this->renderView('tableRow', $data);
    }

}
