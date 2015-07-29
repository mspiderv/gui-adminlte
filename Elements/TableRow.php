<?php

namespace Vitlabs\GUIAdminLTE\Elements;

use Vitlabs\GUIAdmin\Contracts\Elements\TableRowContract;
use Vitlabs\GUICore\Traits\AttributesTrait;

class TableRow extends Element implements TableRowContract {

    use AttributesTrait {
        AttributesTrait::__construct as protected setAttributes;
    }

    protected $cells = [];

    public function __construct($data)
    {
        $this->cells = $data;
        
        $this->setAttribute('data-level', 0);
        $this->setAttribute('data-sortgroup', 'default');
    }

    public function level($level = null)
    {
        return $this->getOrSetAttribute('data-level', $level);
    }

    public function sortgroup($sortgroup = null)
    {
        return $this->getOrSetAttribute('data-sortgroup', $sortgroup);
    }

    public function render()
    {
        $data = [];
        $data['attrs'] = $this->parseAttributes();
        $data['cells'] = $this->cells;

        return $this->renderView('tableRow', $data);
    }

}
