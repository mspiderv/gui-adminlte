<?php

namespace Vitlabs\GUIAdminLTE\Providers;

use Vitlabs\GUICore\Providers\ImplementationServiceProvider;

class GUIAdminLTEElementsServiceProvider extends ImplementationServiceProvider
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
        'Collapsible',
        'Container',
        'Dropdown',
        'DropdownDivider',
        'DropdownItem',
        'HTML',
        'Icon',
        'InfoWidget',
        'Login',
        'ProgressBar',
        'Row',
        'Tab',
        'Table',
        'TableRow',
        'Tabs',
        'Tag',
        'TagContainer',
        'Window',
    ];

    protected function getPackageName()
    {
        return 'gui-adminlte';
    }

    protected function translationDirs()
    {
        return [
            __DIR__ . '/../Resources/lang/'
        ];
    }

    protected function assetDirs()
    {
        return [
            __DIR__ . '/../Assets/'
        ];
    }

    protected function configFiles()
    {
        return [
            __DIR__ . '/../Config/' . $this->getPackageName() . '.php'
        ];
    }

    protected function viewDirs()
    {
        return [
            __DIR__ . '/../Resources/views/'
        ];
    }

}
