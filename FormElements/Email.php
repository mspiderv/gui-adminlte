<?php

namespace Vitlabs\GUIAdminLTE\FormElements;

class Email extends Input {

    public function __construct()
    {
        $this->addClass('form-control');
        $this->setAttribute('type', 'email');
    }

}
