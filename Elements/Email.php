<?php

namespace Vitlabs\GUIAdminLTE\Elements;

class Email extends Input {

    public function __construct()
    {
        $this->setAttribute('type', 'email');
    }

}
