<?php

namespace Vitlabs\GUIAdminLTE\Elements;

use Vitlabs\GUIAdmin\Contracts\Elements\TabContract;
use Vitlabs\GUICore\Traits\DataTrait;
use Vitlabs\GUICore\Traits\ContainerTrait;

class Tab extends Element implements TabContract {

	use ContainerTrait, DataTrait {
		DataTrait::__construct insteadof ContainerTrait;
	}

	protected static $tabId = 1;

	public function __construct($title)
	{
		$this->set('title', $title);
		$this->set('tabId', self::$tabId++);
	}

	public function getTabId()
	{
		return $this->get('tabId');
	}

	public function getTitle()
	{
		return $this->get('title');
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
