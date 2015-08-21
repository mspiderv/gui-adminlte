<?php

namespace Vitlabs\GUIAdminLTE\Elements;

use Vitlabs\GUIAdmin\Contracts\Elements\DropdownItemContract;
use Vitlabs\GUICore\Traits\DataTrait;
use Vitlabs\GUICore\Traits\AttributesTrait;

class DropdownItem extends Element implements DropdownItemContract {

    use AttributesTrait, DataTrait {
		AttributesTrait::__construct as protected setAttributes;
	}

    public function __construct($content = '', $href = '#', $attributes = [])
    {
    	$this->set('content', $content);

    	$this->setAttributes($attributes);
        $this->attr('href', $href);
    }

    public function render()
    {
    	$data = $this->getData();

    	$data['attrs'] = $this->parseAttributes();

    	return $this->renderView('dropdownItem', $data);
    }

}
