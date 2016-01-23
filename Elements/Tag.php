<?php

namespace Vitlabs\GUIAdminLTE\Elements;

use Vitlabs\GUIAdmin\Contracts\Elements\TagContract;
use Vitlabs\GUICore\Traits\DataTrait;
use Vitlabs\GUICore\Traits\AttributesTrait;

class Tag extends Element implements TagContract {

    use AttributesTrait, DataTrait;

    public function __construct($tag, $content = '', $paired = true, $attributes = [])
    {
    	$this->set('tag', $tag);
    	$this->set('content', $content);
    	$this->set('paired', $paired);

    	$this->setAttributes($attributes);
    }

    public function render()
    {
    	$data = $this->getData();

    	$data['attrs'] = $this->parseAttributes();

    	return $this->renderView('tag', $data);
    }

}
