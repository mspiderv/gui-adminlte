<?php

namespace Vitlabs\GUIAdminLTE\Elements;

use Vitlabs\GUIAdmin\Contracts\Elements\BoxContract;
use Vitlabs\GUICore\Traits\AttributesTrait;
use Vitlabs\GUICore\Traits\DataTrait;
use Vitlabs\GUICore\Traits\ContainerTrait;

class Box extends Element implements BoxContract {

	use AttributesTrait, ContainerTrait, DataTrait;

	public function __construct($title, $state = 'default', $icon = '')
	{
		$this->addClass('box');

		$this->set('title', $title);
		$this->set('state', $state);
		$this->set('icon', $icon);
	}

	public function render()
	{
		$data = $this->getData();

		$data['body'] = $this->renderElements($this->getPositionElements('body'));
		$data['footer'] = $this->renderElements($this->getPositionElements('footer'));

		$data['collapsible'] = config('gui-adminlte.box.collapsible');

		$attrs = $this->getAttributes();

		// Solid ?
		if (config('gui-adminlte.box.solid'))
		{
            $this->addClass('box-solid', $attrs);
		}

		// Append state
		if ($this->get('state') != '')
		{
            $this->addClass('box-' . $this->get('state'), $attrs);
		}

		$data['attrs'] = $this->parseAttributes(true, $attrs);

        $data['headerClass'] = 'box-header';

        if (config('gui-adminlte.box.headerBorders'))
        {
            $data['headerClass'] .= ' with-border';
        }

		return $this->renderView('box', $data);
	}

	public function getDefaultPositionName()
	{
		return 'body';
	}

}
