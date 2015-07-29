<?php

namespace Vitlabs\GUIAdminLTE\Elements;

use Vitlabs\GUIAdmin\Contracts\Elements\IconContract;
use Vitlabs\GUICore\Traits\AttributesTrait;
use Vitlabs\GUICore\Traits\DataTrait;

class Icon extends Element implements IconContract {

	use AttributesTrait, DataTrait;

    public function __construct($icon = '')
    {
        $this->set('icon', $icon);
    }

    public function render()
    {
        $data = $this->getData();

        $attrs = $this->getAttributes();

        if (isset($attrs['class']))
        {
            $attrs['class'] .= ' ' . $this->get('icon');
        }
        else
        {
            $attrs['class'] = $this->get('icon');
        }

        $data['attrs'] = $this->parseAttributes(true, $attrs);

    	return $this->renderView('icon', $data);
    }
    
}
