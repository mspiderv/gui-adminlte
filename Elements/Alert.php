<?php

namespace Vitlabs\GUIAdminLTE\Elements;

use Vitlabs\GUIAdmin\Contracts\Elements\AlertContract;
use Vitlabs\GUICore\Traits\AttributesTrait;
use Vitlabs\GUICore\Traits\DataTrait;

class Alert extends Element implements AlertContract {

	use AttributesTrait, DataTrait;

    public function __construct($content, $state = 'warning', $description = null, $icon = null, $dismissable = true)
    {
        // Set default icon
        if (is_null($icon))
        {
            $icon = $this->config('alertIcon.' . $state, 'alertIcon.default');
        }

        // Set data variables
        $this->set('content', $content);
        $this->set('state', $state);
        $this->set('description', $description);
        $this->set('icon', $icon);
        $this->set('dismissable', $dismissable);

        // Add classes
        $this->addClass('alert');
    }

    public function render()
    {
        $data = $this->getData();
        $attrs = $this->getAttributes();

        // Add state class
        $this->addClass('alert-' . $this->get('state'), $attrs);

        // Dismissable ?
        if ($this->get('dismissable'))
        {
            $this->addClass('alert-dismissable');
        }

        $data['attrs'] = $this->parseAttributes(true, $attrs);

        // Render
    	return $this->renderView('alert', $data);
    }

}
