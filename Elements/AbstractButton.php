<?php

namespace Vitlabs\GUIAdminLTE\Elements;

use Vitlabs\GUICore\Traits\AttributesTrait;
use Vitlabs\GUICore\Traits\DataTrait;

abstract class AbstractButton extends Element {

	use AttributesTrait, DataTrait {
        DataTrait::__construct insteadof AttributesTrait;
    }

    public function render()
    {
        // Set optionals
        $this->setOptional('bg');

        // Set defaults
        $this->setDefault('flat', false);
        $this->setDefault('disabled', false);
        $this->setDefault('block', false);
        $this->setDefault('social', '');
        $this->setDefault('socialOnlyIcon', true);

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

        // Social
        if ($this->get('social') != '')
        {
            $this->addClass('btn-social' . ($this->get('socialOnlyIcon') ? '-icon' : '') . ' btn-' . $this->get('social'), $attrs);
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

        // Dropdown class and data attribute
        if ($this->get('dropdown'))
        {
            $this->addClass('dropdown-toggle', $attrs);
            $this->attr('data-toggle', 'dropdown', $attrs);
        }

        // Get data
        $data = $this->getData();

        // Parse attributes
        $data['attrs'] = $this->parseAttributes(true, $attrs);

        // Render
        return $this->renderView('button', $data);
    }

}
