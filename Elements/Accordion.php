<?php

namespace Vitlabs\GUIAdminLTE\Elements;

use Vitlabs\GUIAdmin\Contracts\Elements\AccordionContract;
use Vitlabs\GUICore\Contracts\Elements\ElementContract;
use Vitlabs\GUICore\Traits\DataTrait;
use Vitlabs\GUICore\Traits\ContainerTrait;

class Accordion extends Element implements AccordionContract {
    
	use ContainerTrait, DataTrait {
		DataTrait::__construct insteadof ContainerTrait;
		DataTrait::__construct as protected dataTraitConstruct;
	}

	protected static $accordionId = 1;

	public function __construct(array $data = [])
	{
		$this->dataTraitConstruct($data);

		$this->set('accordionId', self::$accordionId++);
	}

	public function render()
	{
		$this->setDefault('active', 1);

		$data = $this->getData();

		$data['collapsibles'] = $this->getPositionElements();

		return $this->renderView('accordion', $data);
	}

	public function add(ElementContract $e, $position = null)
    {
    	$position = $this->getPositionName($position);

    	if ( ! $e instanceof CollapsibleElement)
    	{
    		throw new \Exception('Element must be CollapsibleElement.');
    	}

    	$this->container[$position][] = $e;

    	return $this;
    }

}
