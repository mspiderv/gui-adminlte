<?php

namespace Vitlabs\GUIAdminLTE\Elements;

use Vitlabs\GUIAdmin\Contracts\Elements\ButtonDropdownContract;
use Vitlabs\GUICore\Traits\AttributesTrait;
use Vitlabs\GUICore\Traits\DataTrait;

class ButtonDropdown extends Element implements ButtonDropdownContract {

    use AttributesTrait, DataTrait;

    public function __construct($state = 'default', $size = '')
    {
    	$this->setDefault('content', '<span class="caret"></span>');
        $this->setDefault('tag', 'button');
        $this->setDefault('dropdown', true);
        $this->setDefault('flat', false);

        $this->set('state', $state);
        $this->set('size', $size);
    }

    public function render()
    {
        // Set optionals
        $this->setOptional('bg');

        // Set defaults
        $this->setDefault('flat', false);
        $this->setDefault('disabled', false);
        $this->setDefault('block', false);

        // Get attributes
        $attrs = $this->getAttributes();

        // Classes
        $this->addClass('btn', $attrs);

        // Background color
        if ($this->get('bg') != '')
        {
            $this->addClass('bg-' . $this->get('bg'), $attrs);
            $this->set('state', '');
        }

        // State
        if ($this->get('state') != '')
        {
            $this->addClass('btn-' . $this->get('state'), $attrs);
        }

        // Flat
        if ($this->get('flat'))
        {
            $this->addClass('btn-flat', $attrs);
        }

        // Block
        if ($this->get('block'))
        {
            $this->addClass('btn-block', $attrs);
        }

        // Disabled
        if ($this->get('disabled'))
        {
            $this->addClass('disabled', $attrs);
        }

        // Size
        if ($this->get('size') != '')
        {
            $this->addClass('btn-' . $this->get('size'), $attrs);
        }

        // Dropdown class
        if ($this->get('dropdown'))
        {
            $this->addClass('dropdown-toggle', $attrs);
        }

        // Dropdown data attribute
        if ($this->get('dropdown'))
        {
            $this->attr('data-toggle', 'dropdown');
        }

        // Get data
        $data = $this->getData();

        // Parse attributes
        $data['attrs'] = $this->parseAttributes(true, $attrs);

        // Render
        return $this->renderView('button', $data);
    }

}
