<?php

namespace Vitlabs\GUIAdminLTE\Traits;

trait GeneratorTrait
{
    public function window() { return $this->generate(__FUNCTION__, func_get_args()); }
    public function icon($icon = '') { return $this->generate(__FUNCTION__, func_get_args()); }
    public function tag($tag, $content = '', $paired = true, $attributes = []) { return $this->generate(__FUNCTION__, func_get_args()); }
    public function accordion(array $data = []) { return $this->generate(__FUNCTION__, func_get_args()); }
    public function box($title, $state = 'default', $icon = '') { return $this->generate(__FUNCTION__, func_get_args()); }
    public function table() { return $this->generate(__FUNCTION__, func_get_args()); }
    public function tableRow($data) { return $this->generate(__FUNCTION__, func_get_args()); }
    public function login(array $data = []) { return $this->generate(__FUNCTION__, func_get_args()); }
}
