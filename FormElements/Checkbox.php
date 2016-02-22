<?php

namespace Vitlabs\GUIAdminLTE\FormElements;

use Vitlabs\GUIAdmin\Contracts\FormElements\CheckboxContract;

class Checkbox extends FormElement implements CheckboxContract {

    /**
     * Main element wrap class
     * @var string
     */
    protected $mainWrapClass = 'checkbox';

    public function needResources()
    {
        $cfg = $this->config('icheck.checkbox');

        return [
            'css' => [
                '~adminlte/plugins/iCheck/' . $cfg['folder'] . '/' . $cfg['file'] . '.css',
            ],
            'js' => [
                '~adminlte/plugins/iCheck/icheck.min.js',
            ],
            'config' => [
                'gui-adminlte.icheck.checkbox' => 'checkbox'
            ]
        ];
    }

    /**
     * Get/set element value.
     * @param  boolean $value
     * @return value/$this
     */
    public function value($value = null)
    {
        if (is_null($value))
        {
            return $this->get('value');
        }

        else
        {
            $this->set('value', boolval($value));

            return $this;
        }
    }

    /**
     * Set the element value to true.
     * @return $this
     */
    public function check()
    {
        $this->set('value', true);

        return $this;
    }

    /**
     * Set the element value to false.
     * @return $this
     */
    public function uncheck()
    {
        $this->set('value', false);

        return $this;
    }

    /**
     * Get HTML of the rendered label
     * @return string
     */
    public function renderLabel()
    {
        return '';
    }

    /**
     * Get HTML of the rendered field.
     * @return string
     */
    public function renderField()
    {
        $attributes = $this->getAttributes();

        $attributes['name'] = $this->get('name');
        $attributes['value'] = 1;
        $attributes['type'] = 'checkbox';

        // Is checkbox checked ?
        if ($this->get('value'))
        {
            $attributes['checked'] = 'checked';
        }
        else if (isset($attributes['checked']))
        {
            unset($attributes['checked']);
        }

        $field = $this->getGenerator()->tag('input', '', false, $attributes);

        return $this->getGenerator()->tag('label', $field->render() . ' ' . $this->get('label'), true)->render();
    }

}
