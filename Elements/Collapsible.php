<?php

namespace Vitlabs\GUIAdminLTE\Elements;

use Vitlabs\GUIAdmin\Contracts\Elements\CollapsibleContract;
use Vitlabs\GUICore\Traits\DataTrait;
use Vitlabs\GUICore\Traits\ContainerTrait;
use Vitlabs\GUICore\Traits\AttributesTrait;

class Collapsible extends Element implements CollapsibleContract {

	use ContainerTrait, DataTrait, AttributesTrait;

	protected static $collapsibleId = 1;

	public function __construct($title = '', $state = 'default')
	{
		$this->set('title', $title);
		$this->set('state', $state);
		$this->set('collapsibleId', self::$collapsibleId++);
	}

    // Get or set
    public function title($title = null)
    {
        return $this->getOrSet('title', $title);
    }

    // Get or set
    public function state($state = null)
    {
        return $this->getOrSet('state', $state);
    }

	public function getCollapsibleId()
	{
		return $this->get('collapsibleId');
	}

    public function getTitle()
    {
        return $this->get('title');
    }

    public function getState()
    {
        return $this->get('state');
    }

    public function getContent()
    {
        return $this->renderElements($this->getAllElements());
    }

	public function render()
	{
		return $this->getContent();
	}

}
