<?php

namespace Vitlabs\GUIAdminLTE\Elements;

use Vitlabs\GUIAdmin\Contracts\Elements\DropdownContract;
use Vitlabs\GUICore\Traits\AttributesTrait;
use Vitlabs\GUICore\Traits\ContainerTrait;

class Dropdown extends Element implements DropdownContract {

	use AttributesTrait, ContainerTrait {
        ContainerTrait::__construct insteadof AttributesTrait;
    }

	public function render()
	{
        // Create dat array
		$data = [];

        // Get attributes
        $attrs = $this->getAttributes();

        // Add classes
        $this->addClass('dropdown-menu', $attrs);

        // Set attributes
        $attrs['role'] = 'menu';

        // Set data
		$data['content'] = $this->renderElements($this->getPositionElements());
        $data['attrs'] = $this->parseAttributes(true, $attrs);

        // Render
		return $this->renderView('dropdown', $data);
	}

}
