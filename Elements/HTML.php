<?php

namespace Vitlabs\GUIAdminLTE\Elements;

use Vitlabs\GUICore\Traits\DataTrait;
use Vitlabs\GUIAdmin\Contracts\Elements\HTMLContract;

class HTML extends Element implements HTMLContract {

    use DataTrait;

    public function __construct($content = '')
    {
        $this->set('content', $content);
    }

    public function render()
    {
        return $this->get('content');
    }

}
