<?php

namespace Vitlabs\GUIAdminLTE\Elements;

use Vitlabs\GUIAdmin\Contracts\Elements\DropdownDividerContract;
use Vitlabs\GUICore\Traits\AttributesTrait;

class DropdownDivider extends Element implements DropdownDividerContract {

    use AttributesTrait;

    public function __construct()
    {
        $this->addClass('divider');
    }

    public function render()
    {
    	$data = [];

    	$data['attrs'] = $this->parseAttributes();

    	return $this->renderView('dropdownDivider', $data);
    }

}
