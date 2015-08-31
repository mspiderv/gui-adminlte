<?php

namespace Vitlabs\GUIAdminLTE\FormElements;

use Vitlabs\GUIAdminLTE\Elements\Element;
use Vitlabs\GUIAdmin\Contracts\FormElements\FormContract;
use Vitlabs\GUICore\Traits\DataTrait;
use Vitlabs\GUICore\Traits\ContainerTrait;

class Form extends Element implements FormContract {

	use ContainerTrait, DataTrait;

    public function __construct(array $form = [])
    {
        $this->set('form', $form);
    }

	public function render()
	{
		$data = $this->getData();

		$data['content'] = $this->renderElements($this->getPositionElements());

		return $this->renderView('form', $data);
	}

}
