<?php

namespace Vitlabs\GUIAdminLTE\Elements;

use Vitlabs\GUIAdmin\Contracts\Elements\CollapsibleContract;
use Vitlabs\GUIAdmin\Contracts\Elements\AccordionContract;
use Vitlabs\GUICore\Contracts\Elements\ElementContract;
use Vitlabs\GUICore\Traits\DataTrait;
use Vitlabs\GUICore\Traits\ContainerTrait;
use Vitlabs\GUICore\Traits\AttributesTrait;

class Accordion extends Element implements AccordionContract {

	use ContainerTrait, DataTrait, AttributesTrait {
		DataTrait::__construct insteadof ContainerTrait;
        DataTrait::__construct as protected dataTraitConstruct;
		AttributesTrait::__construct as protected attributesTraitConstruct;
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

    	if ( ! $e instanceof CollapsibleContract)
    	{
    		throw new \Exception('Element added to accordeon element must implements CollapsibleContract interface.');
    	}

    	$this->container[$position][] = $e;

    	return $this;
    }

}
