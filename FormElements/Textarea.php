<?php

namespace Vitlabs\GUIAdminLTE\FormElements;

use Vitlabs\GUIAdmin\Contracts\FormElements\TextareaContract;
use Vitlabs\GUICore\Traits\PlaceholderTrait;

class Textarea extends FormElement implements TextareaContract {

    use PlaceholderTrait;

    function __construct()
    {
        $this->addClass('form-control');
        $this->setAttribute('type', 'text');
        $this->setAttribute('rows', '3');
    }

    /**
     * Get HTML of the rendered field.
     * @return string
     */
    public function renderField()
    {
        $attributes = $this->getAttributes();

        $attributes['name'] = $this->get('name');

        return $this->getGenerator()->tag('textarea', $this->getEscapedValue(), true, $attributes)->render();
    }

}
