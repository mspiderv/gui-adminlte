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
        'Callout',
        'Collapsible',
        'Container',
        'HTML',
        'Icon',
        'Login',
        'ProgressBar',
        'Row',
        'Tab',
        'Table',
        'TableRow',
        'Tabs',
        'Tag',
        'Window',
    ];

    protected function getViewPath()
    {
        return __DIR__ . '/../Resources/views/elements/';
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
