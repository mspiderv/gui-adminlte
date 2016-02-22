<?php

namespace Vitlabs\GUIAdminLTE\Elements;

use Vitlabs\GUICore\Traits\ElementTrait;
use Vitlabs\GUICore\Contracts\Elements\ElementContract;

abstract class Element implements ElementContract {

    use ElementTrait;

    public function getPackageName()
    {
        return 'gui-adminlte';
    }

    public function getViewsFolder()
    {
        return 'elements';
    }

}
