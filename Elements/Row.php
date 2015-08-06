<?php

namespace Vitlabs\GUIAdminLTE\Elements;

use Vitlabs\GUIAdmin\Contracts\Elements\RowContract;
use Vitlabs\GUICore\Traits\ContainerTrait;
use Vitlabs\GUICore\Traits\AttributesTrait;

class Row extends Element implements RowContract {

	use AttributesTrait, ContainerTrait;

	protected $cols;

	public function __construct($c1, $c2 = null, $c3 = null, $c4 = null, $c5 = null, $c6 = null, $c7 = null, $c8 = null, $c9 = null, $c10 = null, $c11 = null, $c12 = null)
	{
        // Create columns
		$this->cols = [$c1];

        for ($i = 2; $i <= 12; $i++)
        {
            $var = 'c' . $i;

            if ($$var != null)
            {
                $this->cols[] = $$var;
            }
        }

        // Add classes
        $this->addClass('row');
	}

	public function render()
	{
		$count = count($this->cols);

		$elements = [];

		for ($i = 0; $i < $count; $i++)
		{
			$elements[$i] = [];
		}

		$i = 0;

		foreach ($this->getAllElements() as $element)
		{
			$elements[$i++][] = $element;

			if ($i == $count)
			{
				$i = 0;
			}
		}

		return $this->renderView('row', [
            'attrs' => $this->parseAttributes(),
			'count' => $count,
			'cols' => $this->cols,
			'elements' => $elements,
		]);
	}

}
