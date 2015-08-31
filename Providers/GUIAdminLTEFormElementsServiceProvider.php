<?php

namespace Vitlabs\GUIAdminLTE\Providers;

use Vitlabs\GUICore\Providers\ImplementationServiceProvider;

class GUIAdminLTEFormElementsServiceProvider extends ImplementationServiceProvider
{
    protected $contractsNamespace = 'Vitlabs\GUIAdmin\Contracts\FormElements\\';

    protected $implementationsNamespace = 'Vitlabs\GUIAdminLTE\FormElements\\';

    protected $bindElements = [
        'Checkbox',
        'Editor',
        'Email',
        'File',
        'Form',
        'Input',
        'Password',
        'Radio',
        'Select',
        'Submit',
        'Textarea',
    ];

    protected function getViewPath()
    {
        return __DIR__ . '/../Resources/views/';
    }

    protected function getAssetsPath()
    {
        return __DIR__ . '/../Assets/';
    }

}
