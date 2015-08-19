<?php

namespace Vitlabs\GUIAdminLTE\Elements;

use Vitlabs\GUIAdmin\Contracts\Elements\TabsContract;
use Vitlabs\GUIAdmin\Contracts\Elements\TabContract;
use Vitlabs\GUICore\Contracts\Elements\ElementContract;
use Vitlabs\GUICore\Traits\DataTrait;
use Vitlabs\GUICore\Traits\ContainerTrait;
use Vitlabs\GUICore\Traits\AttributesTrait;

class Tabs extends Element implements TabsContract {

	use AttributesTrait, ContainerTrait, DataTrait;

    public function __construct($title, $icon = null, $active = 1)
    {
        $this->set('title', $title);
        $this->set('icon', $icon);
        $this->set('active', $active);
        $this->addClass('nav-tabs-custom');
    }

	public function render()
	{
		$data = $this->getData();

		$data['tabs'] = $this->getPositionElements('tabs');
        $data['tools'] = $this->renderElements($this->getPositionElements('tools'));
        $data['pullRight'] = config('gui-adminlte.tabsPullRight');
        $data['attrs'] = $this->parseAttributes();

		if ($data['pullRight'])
		{
			$data['tabs'] = array_reverse($data['tabs']);
		}

		return $this->renderView('tabs', $data);
	}

	public function add(ElementContract $e, $position = null)
    {
    	$position = $this->getPositionName($position);

    	if ($position == 'tabs' &&  ! $e instanceof TabContract)
    	{
    		throw new \Exception('Element added to tabs element must implements TabContract interface.');
    	}

    	$this->container[$position][] = $e;

    	return $this;
    }

    public function getDefaultPositionName()
    {
        return 'tabs';
    }

}
