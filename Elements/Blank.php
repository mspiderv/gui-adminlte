<?php

namespace Vitlabs\GUIAdminLTE\Elements;

use Vitlabs\GUIAdmin\Contracts\Elements\BlankContract;

class Blank extends Element implements BlankContract {

    public function __construct()
    {
    }

    public function render()
    {
        return '';
    }

}
