<?php

namespace Vitlabs\GUIAdminLTE\Elements;

class Email extends Input {

    public function __construct()
    {
        $this->addClass('form-control');
        $this->setAttribute('type', 'email');
    }

}
