<?php

namespace Vitlabs\GUIAdminLTE\FormElements;

use Vitlabs\GUIAdminLTE\Elements\Element;
use Vitlabs\GUIAdmin\Contracts\FormElements\FormElementContract;
use Vitlabs\GUICore\Traits\DataTrait;
use Vitlabs\GUICore\Traits\AttributesTrait;

abstract class FormElement extends Element implements FormElementContract {

    use AttributesTrait, DataTrait;

    /**
     * Main element wrap class
     * @var string
     */
    protected $mainWrapClass = 'form-group';

    /**
     * Form elements should not have construct method.
     */
    public function __construct()
    {
    }

    /**
     * Get/set element label.
     * @param  string $label
     * @return value/$this
     */
    public function label($label)
    {
        return $this->getOrSet('label', $label);
    }

    /**
     * Get/set element name.
     * @param  string $name
     * @return value/$this
     */
    public function name($name)
    {
        return $this->getOrSet('name', $name);
    }

    /**
     * Get/set element value.
     * @param  string $value
     * @return value/$this
     */
    public function value($value)
    {
        return $this->getOrSet('value', $value);
    }

    /**
     * Get escaped current element value by htmlspecialchars PHP function.
     * @return string
     */
    public function getEscapedValue()
    {
        return htmlspecialchars($this->get('value'));
    }

    /**
     * Is element disabled/Enable/Disable element.
     * @param  boolean $disabled
     * @return boolean/$this
     */
    public function disabled($disabled = null)
    {
        if ($disabled == null)
        {
            return $this->hasAttribute('disabled');
        }

        else
        {
            $disabled ? $this->setAttribute('disabled', 'disabled') : $this->removeAttribute('disabled');

            return $this;
        }
    }

    /**
     * Disable the element.
     * @return $this
     */
    public function disable()
    {
        $this->setAttribute('disabled', 'disabled');

        return $this;
    }

    /**
     * Enable the element.
     * @return $this
     */
    public function enable()
    {
        $this->removeAttribute('disabled');

        return $this;
    }

    /**
     * Get/set element help.
     * @param  string $help
     * @return value/$this
     */
    public function help($help)
    {
        return $this->getOrSet('help', $help);
    }

    /**
     * Get/set element id.
     * @param  string $id
     * @return value/$this
     */
    public function id($id)
    {
        return $this->getOrSetAttribute('id', $id);
    }

    /**
     * Set the element status to "success"
     * @return $this
     */
    public function hasSuccess()
    {
        $this->set('status', 'success');

        return $this;
    }

    /**
     * Set the element status to "warning"
     * @return $this
     */
    public function hasWarning()
    {
        $this->set('status', 'warning');

        return $this;
    }

    /**
     * Set the element status to "error"
     * @return $this
     */
    public function hasError()
    {
        $this->set('status', 'error');

        return $this;
    }

    /**
     * Get/set element status.
     * @param  string $status
     * @return value/$this
     */
    public function status($status)
    {
        return $this->getOrSet('status', $status);
    }

    /**
     * Get the HTML of the rendered element.
     * @return string
     */
    public function render()
    {
        $data = [
            'wrapClasses' => $this->getWrapClasses(),
            'label' => $this->renderLabel(),
            'field' => $this->renderField(),
            'help' => $this->renderHelp(),
        ];

        return $this->renderView('formElement', $data);
    }

    /**
     * Get status classes
     * @return string
     */
    public function getStatusClasses()
    {
        switch ($this->get('status'))
        {
            case 'success':
                return 'has-success';

            case 'warning':
                return 'has-warning';

            case 'error':
                return 'has-error';

            default:
                return '';
        }
    }

    /**
     * Get form wrap classes
     * @return string
     */
    public function getWrapClasses()
    {
        return $this->mainWrapClass . ' ' . $this->getStatusClasses();
    }

    /**
     * Get HTML of the rendered label
     * @return string
     */
    public function renderLabel()
    {
        // If there is no label.
        if ( ! $this->has('label'))
        {
            return '';
        }

        // Is there any label icon ?
        switch ($this->get('status'))
        {
            case 'success':
                $labelIcon = '<i class="fa fa-check"></i>';
                break;

            case 'warning':
                $labelIcon = '<i class="fa fa-bell-o"></i>';
                break;

            case 'error':
                $labelIcon = '<i class="fa fa-times-circle-o"></i>';
                break;

            default:
                $labelIcon = '';
                break;
        }

        $labelValue = $this->get('label');

        $labelElement = $this->getGenerator()->tag('label', $labelIcon . ' ' . $labelValue, true);

        // Do we need to set "for" attribute ?
        if ($this->hasAttribute('id'))
        {
            $labelElement->setAttribute('for', $this->getAttribute('id'));
        }

        return $labelElement->render();
    }

    /**
     * Get HTML of the rendered help block.
     * @return string
     */
    public function renderHelp()
    {
        // If there is no help.
        if ( ! $this->has('help'))
        {
            return '';
        }

        $helpValue = $this->get('help');

        $labelElement = $this->getGenerator()->tag('p', $helpValue, true, [
            'class' => 'help-block'
        ]);

        return $labelElement->render();
    }

}
