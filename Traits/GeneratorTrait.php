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
    public function collapsible($title = '', $state = 'default') { return $this->generate(__FUNCTION__, func_get_args()); }
    public function row($c1, $c2 = null, $c3 = null, $c4 = null, $c5 = null, $c6 = null, $c7 = null, $c8 = null, $c9 = null, $c10 = null, $c11 = null, $c12 = null) { return $this->generate(__FUNCTION__, func_get_args()); }
}