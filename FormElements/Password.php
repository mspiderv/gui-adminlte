<?php

namespace Vitlabs\GUIAdminLTE\FormElements;

class Password extends Input {

    public function __construct()
    {
        $this->addClass('form-control');
        $this->setAttribute('type', 'password');
    }

}
