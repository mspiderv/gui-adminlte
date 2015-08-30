<?php

namespace Vitlabs\GUIAdminLTE\Elements;

use Vitlabs\GUIAdmin\Contracts\Elements\SubmitContract;

class Submit extends AbstractButton implements SubmitContract {

    public function __construct($value = '', $state = 'primary', $dropdown = false, $size = '', $attributes = [])
    {
    	$this->set('content', $value);
        $this->set('state', $state);
        $this->set('tag', 'button');
        $this->set('dropdown', $dropdown);
        $this->set('size', $size);

    	$this->setAttributes($attributes);
    }

}
