<?php

namespace Vitlabs\GUIAdminLTE\Elements;

use Vitlabs\GUIAdmin\Contracts\Elements\ButtonGroupContract;
use Vitlabs\GUICore\Traits\AttributesTrait;
use Vitlabs\GUICore\Traits\ContainerTrait;
use Vitlabs\GUICore\Traits\DataTrait;

class ButtonGroup extends Element implements ButtonGroupContract {

	use AttributesTrait, ContainerTrait, DataTrait {
		ContainerTrait::__construct insteadof AttributesTrait, DataTrait;
	}

	public function render()
	{
        // Set default vertical value
		$this->setDefault('vertical', false);

        // Get attributes
        $attrs = $this->getAttributes();

        // Add vertical class if needed
        $this->addClass($this->get('vertical') ? 'btn-group-vertical' : 'btn-group', $attrs);

        // Get data
		$data = $this->getData();

        // Set data
        $data['content'] = $this->renderElements($this->getPositionElements());
		$data['attrs'] = $this->parseAttributes(true, $attrs);

        // Render
		return $this->renderView('buttonGroup', $data);
	}

}
