<?php

namespace Vitlabs\GUIAdminLTE\Elements;

use Vitlabs\GUICore\Traits\ElementTrait;

abstract class Element {

    use ElementTrait;

    public function getViewsFolder()
    {
        return 'elements';
    }

}
