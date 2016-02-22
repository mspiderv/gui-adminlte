<?php

namespace Vitlabs\GUIAdminLTE\FormElements;

use Exception;
use Vitlabs\GUIAdmin\Contracts\FormElements\EditorContract;

class Editor extends FormElement implements EditorContract {

    /**
     * Name of the editor's implementation GUI element.
     * @var null
     */
    protected $implementation = null;
    protected $editor = null;

    public function __construct($implementation = null)
    {
        $this->implementation = is_null($implementation) ? $this->config('editorImplementation') : $implementation;
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

    /**
     * Call FieldContract's methods on the implementation class.
     * @param  string $method
     * @return mixed
     */
    protected function callImplementation($method)
    {
        $result = call_user_func_array([ $this->editor, $method ], func_get_args());
        
        return (is_object($result) && $result == $this->editor) ? $this : $result;
    }

    /**
     * Get HTML of the rendered field.
     * @return string
     */
    public function renderField()
    {
        return $this->callImplementation(__FUNCTION__);
    }

    /**
     * Get/set editor's name.
     * @param  string $name
     * @return value/$this
     */
    public function name($name = null)
    {
        return $this->callImplementation(__FUNCTION__, $name);
    }

    /**
     * Get/set editor's value.
     * @param  string $value
     * @return value/$this
     */
    public function value($value = null)
    {
        return $this->callImplementation(__FUNCTION__, $value);
    }

    /**
     * Get escaped current element value by htmlspecialchars PHP function.
     * @return string
     */
    public function getEscapedValue()
    {
        return $this->callImplementation(__FUNCTION__);
    }

    /**
     * Is element disabled/Enable/Disable element.
     * @param  boolean $disabled
     * @return boolean/$this
     */
    public function disabled($disabled = null)
    {
        return $this->callImplementation(__FUNCTION__, $disabled);
    }

    /**
     * Disable the element.
     * @return $this
     */
    public function disable()
    {
        return $this->callImplementation(__FUNCTION__);
    }

    /**
     * Enable the element.
     * @return $this
     */
    public function enable()
    {
        return $this->callImplementation(__FUNCTION__);
    }

}
