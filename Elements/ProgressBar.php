<?php

namespace Vitlabs\GUIAdminLTE\Elements;

use Vitlabs\GUIAdmin\Contracts\Elements\ProgressBarContract;
use Vitlabs\GUICore\Traits\DataTrait;

class ProgressBar extends Element implements ProgressBarContract {

    use DataTrait;

    public function __construct($value = 0, $state = 'default', $vertical = false)
    {
        $this->set('value', $value);
        $this->set('state', $state);
        $this->set('vertical', $vertical);
    }

    public function render()
    {
        $this->setOptional('size');
        $this->setDefault('striped', true);
        $this->setDefault('active', true);
        $this->setDefault('min', 0);
        $this->setDefault('max', 100);
        $this->set('percents', round($this->get('value') / $this->get('max') * 100));

        return $this->renderView('progressBar', $this->getData());
    }

}
