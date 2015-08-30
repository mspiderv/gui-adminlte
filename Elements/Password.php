<?php

namespace Vitlabs\GUIAdminLTE\Elements;

class Password extends Input {

    public function __construct()
    {
        $this->addClass('form-control');
        $this->setAttribute('type', 'password');
    }

}
