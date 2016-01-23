<?php

namespace Vitlabs\GUIAdminLTE\Elements;

use Vitlabs\GUIAdmin\Contracts\Elements\ButtonSocialContract;
use Vitlabs\GUICore\Facades\Generator as GUI;
use Vitlabs\GUICore\Traits\AttributesTrait;
use Vitlabs\GUICore\Traits\DataTrait;

class ButtonSocial extends AbstractButton implements ButtonSocialContract {

    public function __construct($social = '', $content = '', $icon = null)
    {
        $iconElement = GUI::icon(($icon == null) ? 'fa fa-' . $social : $icon);

        $this->set('content', $iconElement . $content);
        $this->set('state', '');
        $this->set('tag', 'a');
        $this->set('dropdown', false);
        $this->set('size', '');
        $this->set('social', $social);
        $this->set('socialOnlyIcon', $content == '');
    }

}
