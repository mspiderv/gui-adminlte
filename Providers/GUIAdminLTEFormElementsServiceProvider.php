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

    protected function getPackageName()
    {
        return 'gui-adminlte';
    }

    protected function assetDirs()
    {
        return [
            __DIR__ . '/../Assets/'
        ];
    }

    protected function viewDirs()
    {
        return [
            __DIR__ . '/../Resources/views/'
        ];
    }

}
