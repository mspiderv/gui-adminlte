<?php

namespace Vitlabs\GUIAdminLTE\Elements;

use Vitlabs\GUIAdmin\Contracts\Elements\InputContract;
use Vitlabs\GUICore\Traits\PlaceholderTrait;

class Input extends FormElement implements InputContract {

    use PlaceholderTrait;

    function __construct()
    {
        $this->addClass('form-control');
        $this->setAttribute('type', 'text');
    }

    /**
     * Get/set the current input type.
     * @param  string $type
     * @return value/$this
     */
    public function type($type = null)
    {
        return $this->getOrSetAttribute('type', $type);
    }

    /**
     * Get/set the current input height.
     * @param  string $height
     * @return value/$this
     */
    public function height($height = null)
    {
        return $this->getOrSet('height', $height);
    }

    /**
     * Get HTML of the rendered field.
     * @return string
     */
    public function renderField()
    {
        $attributes = $this->getAttributes();

        $attributes['name'] = $this->get('name');
        $attributes['value'] = $this->getEscapedValue();

        return $this->getGenerator()->tag('input', '', false, $attributes)->render();
    }

    /**
     * Get form wrap classes
     * @return string
     */
    public function getWrapClasses()
    {
        $classes = parent::getWrapClasses();

        // Has element custom height ?
        if ($this->has('height'))
        {
            switch($this->get('height'))
            {
                case 'large':
                    $classes .= ' input-group-lg';
                    break;

                case 'small':
                    $classes .= ' input-group-sm';
                    break;
            }
        }

        return $classes;
    }

}
