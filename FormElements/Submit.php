<?php

namespace Vitlabs\GUIAdminLTE\FormElements;

use Vitlabs\GUIAdminLTE\Elements\AbstractButton;
use Vitlabs\GUIAdmin\Contracts\FormElements\SubmitContract;

class Submit extends AbstractButton implements SubmitContract {

    public function __construct($value = '', $state = 'primary', $dropdown = false, $size = '', $attributes = [])
    {
    	$this->set('content', $value);
        $this->set('state', $state);
        $this->set('tag', 'button');
        $this->set('dropdown', $dropdown);
        $this->set('size', $size);

        $this->setAttributes($attributes);
    	$this->attr('type', 'submit');
    }

}
