<?php

namespace Vitlabs\GUIAdminLTE\Elements;

use Vitlabs\GUIAdmin\Contracts\Elements\ButtonContract;
use Vitlabs\GUICore\Traits\AttributesTrait;
use Vitlabs\GUICore\Traits\DataTrait;

class Button extends AbstractButton implements ButtonContract {

	public function __construct($content = '', $state = 'default', $tag = 'a', $dropdown = false, $size = '')
	{
        $this->set('content', $content);
        $this->set('state', $state);
        $this->set('tag', $tag);
        $this->set('dropdown', $dropdown);
        $this->set('size', $size);
	}

}
