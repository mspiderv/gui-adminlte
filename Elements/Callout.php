<?php

namespace Vitlabs\GUIAdminLTE\Elements;

use Config;
use Vitlabs\GUIAdmin\Contracts\Elements\CalloutContract;
use Vitlabs\GUICore\Traits\AttributesTrait;
use Vitlabs\GUICore\Traits\DataTrait;

class Callout extends Element implements CalloutContract {

	use AttributesTrait, DataTrait;

    public function __construct($heading, $state = 'info', $content = null)
    {
        // Set data variables
        $this->set('heading', $heading);
        $this->set('state', $state);
        $this->set('content', $content);

        // Add classes
        $this->addClass('callout');
    }

    public function render()
    {
        $data = $this->getData();
        $attrs = $this->getAttributes();

        // Add state class
        $this->addClass('callout-' . $this->get('state'), $attrs);

        $data['attrs'] = $this->parseAttributes(true, $attrs);

        // Render
    	return $this->renderView('callout', $data);
    }

}
