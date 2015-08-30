<?php

namespace Vitlabs\GUIAdminLTE\Elements;

use Vitlabs\GUIAdmin\Contracts\Elements\SelectContract;
use Vitlabs\GUICore\Traits\PlaceholderTrait;

class Select extends FormElement implements SelectContract {

    use PlaceholderTrait;

    function __construct()
    {
        parent::__construct();
        $this->addClass('form-control');
        $this->set('options', []);
    }

    public function needResources()
    {
        return [
            'css-before' => [
                'AdminLTE-2.2.0/plugins/select2/select2.min.css',
            ],
            'js' => [
                'AdminLTE-2.2.0/plugins/select2/select2.full.min.js',
            ],
        ];
    }

    /**
     * Set select element to multiple/single element.
     * @param  boolean $multiple
     * @return $this
     */
    public function multiple($multiple = true)
    {
        $multiple ? $this->setAttribute('multiple', 'multiple') : $this->removeAttribute('multiple');

        return $this;
    }

    /**
     * Determine whether the select element is multiple.
     * @return boolean
     */
    public function isMultiple()
    {
        return $this->hasAttribute('multiple');
    }

    /**
     * Get/set select options.
     * @param  array $options
     * @return options/$this
     */
    public function options($options = null)
    {
        return $this->getOrSet('options', $options);
    }

    /**
     * Get/set select value(s).
     * @param  mix $value(s)
     * @return mix/$this
     */
    public function value($value)
    {
        if ($value == null)
        {
            return $this->get('value');
        }

        else
        {
            if ( ! is_array($value))
            {
                $value = [$value];
            }

            $this->set('value', $value);

            return $this;
        }
    }

    /**
     * Determine whether the option is selected.
     * @param  string $optionValue
     * @return boolean
     */
    protected function optionIsSelected($optionValue)
    {
        $selected = $this->get('value');

        if ( ! is_array($selected))
        {
            return false;
        }

        return (in_array($optionValue, $selected));
    }

    /**
     * Get item objects with "type", "value", "text" and "selected" attributes.
     * @return array
     */
    protected function getItem($key, $value)
    {
        $item = new \stdClass;

        $item->type = 'option';
        $item->value = $key;
        $item->text = $value;
        $item->selected = $this->optionIsSelected($key);

        return $item;
    }

    /**
     * Get item objects with "groupName" and "items" attributes.
     * @return array
     */
    protected function getOptgroup($key, $value)
    {
        $item = new \stdClass;

        $item->type = "optgroup";
        $item->groupName = $key;
        $item->items = $this->getItems($value);

        return $item;
    }

    /**
     * Get array of item objects with "type", "value", "text" and "selected" attributes.
     * @return array
     */
    protected function getItems($options)
    {
        $items = [];

        foreach ($options as $key => $value)
        {
            // Is optgroup ?
            if (is_array($value))
            {
                $items[] = $this->getOptgroup($key, $value);
            }

            else
            {
                $items[] = $this->getItem($key, $value);
            }
        }

        return $items;
    }

    /**
     * Get HTML of the rendered field.
     * @return string
     */
    public function renderField()
    {
        $attributes = $this->getAttributes();

        $attributes['name'] = $this->get('name');

        if ($this->isMultiple())
        {
            $attributes['name'] .= '[]';
        }

        $data = [
            'attributes' => $this->parseAttributes(true, $attributes),
            'items' => $this->getItems($this->get('options'))
        ];

        return $this->renderView('select', $data);
    }

}
