<?php

namespace Vitlabs\GUIAdminLTE\FormElements;

use Exception;
use Vitlabs\GUIAdmin\Contracts\FormElements\EditorContract;

class Editor extends FormElement implements EditorContract {

    protected $implementation = null;
    protected $editor = null;

    public function __construct($implementation = null)
    {
        $this->implementation = ($implementation == null) ? $this->config('editorImplementation') : $implementation;
    }

    public function postConstruct()
    {
        try {
            $this->editor = $this->getGenerator()->generate($this->implementation);
        }
        catch(Exception $e)
        {
            throw new Exception("Editor implementation [$this->implementation] could not be generated.", 0, $e);
        }
    }

    /* "Redirect" FieldContract's methods to editor object */

    /**
     * Get HTML of the rendered field.
     * @return string
     */
    public function renderField()
    {
        return $this->editor->renderField();
    }

    /**
     * Get/set element name.
     * @param  string $name
     * @return value/$this
     */
    public function name($name)
    {
        return $this->editor->name($name);
    }

    /**
     * Get/set element value.
     * @param  string $value
     * @return value/$this
     */
    public function value($value)
    {
        return $this->editor->value($name);
    }

    /**
     * Get escaped current element value by htmlspecialchars PHP function.
     * @return string
     */
    public function getEscapedValue()
    {
        return $this->editor->getEscapedValue();
    }

    /**
     * Is element disabled/Enable/Disable element.
     * @param  boolean $disabled
     * @return boolean/$this
     */
    public function disabled($disabled = null)
    {
        return $this->editor->disabled($disabled);
    }

    /**
     * Disable the element.
     * @return $this
     */
    public function disable()
    {
        return $this->editor->disable();
    }

    /**
     * Enable the element.
     * @return $this
     */
    public function enable()
    {
        return $this->editor->enable();
    }

}
