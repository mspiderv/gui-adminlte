<?php

namespace Vitlabs\GUIAdminLTE\Elements;

use Vitlabs\GUIAdmin\Contracts\Elements\FormContract;
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
