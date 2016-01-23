<?php

namespace Vitlabs\GUIAdminLTE\Elements;

use Vitlabs\GUIAdmin\Contracts\Elements\TagContainerContract;
use Vitlabs\GUICore\Traits\AttributesTrait;
use Vitlabs\GUICore\Traits\ContainerTrait;
use Vitlabs\GUICore\Traits\DataTrait;

class TagContainer extends Element implements TagContainerContract {

    use AttributesTrait, ContainerTrait, DataTrait;

	public function __construct($tag = 'div', $class = null)
	{
		$this->set('tag', $tag);

		if ( ! is_null($class))
		{
			$this->addClass($class);
		}
	}

    public function render()
    {
        $data = $this->getData();

        $data['content'] = $this->renderElements($this->getAllElements());
        $data['attrs'] = $this->parseAttributes();

        return $this->renderView('tagContainer', $data);
    }

}
