<?php

namespace Vitlabs\GUIAdminLTE\Elements;

class File extends Input {

    public function __construct()
    {
        $this->setAttribute('type', 'file');
    }

}
