<?php

namespace Vitlabs\GUIAdminLTE\FormElements;

class File extends Input {

    public function __construct()
    {
        $this->setAttribute('type', 'file');
    }

}
