<?php

namespace Vitlabs\GUIAdminLTE\Providers;

use Vitlabs\GUICore\Providers\ImplementationServiceProvider;

class GUIAdminLTEServiceProvider extends ImplementationServiceProvider
{
    protected $contractsNamespace = 'Vitlabs\GUIAdmin\Contracts\Elements\\';

    protected $implementationsNamespace = 'Vitlabs\GUIAdminLTE\Elements\\';

    protected $bindElements = [
        'Accordion',
        'Alert',
        'Blank',
        'Box',
        'Button',
        'ButtonApplication',
        'ButtonDropdown',
        'ButtonGroup',
        'ButtonSocial',
        'Callout',
        'Checkbox',
        'Collapsible',
        'Container',
        'Dropdown',
        'DropdownDivider',
        'DropdownItem',
        'Email',
        'File',
        'Form',
        'HTML',
        'Icon',
        'InfoWidget',
        'Input',
        'Login',
        'Password',
        'ProgressBar',
        'Radio',
        'Row',
        'Select',
        'Submit',
        'Tab',
        'Table',
        'TableRow',
        'Tabs',
        'Tag',
        'TagContainer',
        'Textarea',
        'Window',
    ];

    protected function getViewPath()
    {
        return __DIR__ . '/../Resources/views/';
    }

    protected function getAssetsPath()
    {
        return __DIR__ . '/../Assets/';
    }

    protected function publishConfig()
    {
        return [
            __DIR__ . '/../Config/config.php' => 'gui-adminlte'
        ];
    }

    protected function loadTranslations()
    {
        return [
            __DIR__ . '/../Resources/lang' => 'gui-adminlte'
        ];
    }

}
