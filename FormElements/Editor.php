<?php

namespace Vitlabs\GUIAdminLTE\FormElements;

use Vitlabs\GUIAdmin\Contracts\FormElements\EditorContract;
use Vitlabs\GUICore\Traits\PlaceholderTrait;

class Editor extends FormElement implements EditorContract {

    use PlaceholderTrait;

    public function __construct()
    {
        $this->addClass(config('gui-adminlte.editorClass'));
        $this->setAttribute('type', 'text');
        $this->setAttribute('rows', '3');
    }

    public function needResources()
    {
        return [
            'js' => [
                'ckeditor/ckeditor.js',
                'ckeditor/adapters/jquery.js',
            ],
            'config' => [
                'gui-adminlte.editorClass',
            ],
        ];
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
