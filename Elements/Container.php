<?php

namespace Vitlabs\GUIAdminLTE\Elements;

use Vitlabs\GUIAdmin\Contracts\Elements\ContainerContract;
use Vitlabs\GUICore\Traits\ContainerTrait;

class Container extends Element implements ContainerContract {

	use ContainerTrait;

	public function render()
	{
		return $this->renderElements($this->getAllElements());
	}

}
