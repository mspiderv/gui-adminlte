<?php

namespace Vitlabs\GUIAdminLTE\Elements;

use Vitlabs\GUIAdmin\Contracts\Elements\ButtonApplicationContract;
use Vitlabs\GUICore\Traits\DataTrait;
use Vitlabs\GUICore\Traits\AttributesTrait;

class ButtonApplication extends Element implements ButtonApplicationContract {

    use AttributesTrait, DataTrait;

    public function __construct($content = '', $tag = 'a', $icon = '', $badge = '', $badgeBg = 'default')
    {
    	$this->set('content', $content);
        $this->set('tag', $tag);
        $this->set('icon', $icon);
        $this->set('badge', $badge);
        $this->set('badgeBg', $badgeBg);

        // Classes
        $this->addClass('btn btn-app');
    }

    public function render()
    {
        // Get data
        $data = $this->getData();

        // Parse attributes
        $data['attrs'] = $this->parseAttributes();

        // Render
        return $this->renderView('buttonApplication', $data);
    }

}
