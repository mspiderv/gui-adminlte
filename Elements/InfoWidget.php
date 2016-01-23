<?php

namespace Vitlabs\GUIAdminLTE\Elements;

use Vitlabs\GUIAdmin\Contracts\Elements\InfoWidgetContract;
use Vitlabs\GUICore\Traits\AttributesTrait;
use Vitlabs\GUICore\Traits\DataTrait;

class InfoWidget extends Element implements InfoWidgetContract {

	use AttributesTrait, DataTrait;

    public function __construct($heading = '', $content = '', $icon = '', $bg = '')
    {
        $this->set('heading', $heading);
        $this->set('content', $content);
        $this->set('icon', $icon);
        $this->set('bg', $bg);

        $this->addClass('info-box');
    }

	public function render()
	{
        $data = $this->getData();

        $data['attrs'] = $this->parseAttributes();

		return $this->renderView('infoWidget', $data);
	}

}
