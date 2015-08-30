<?php

namespace Vitlabs\GUIAdminLTE\Traits;

trait GeneratorTrait {

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
    public function tabs($title, $icon = null, $active = 1) { return $this->generate(__FUNCTION__, func_get_args()); }
    public function tab($title) { return $this->generate(__FUNCTION__, func_get_args()); }
    public function alert($content, $state = 'warning', $description = null, $icon = null, $dismissable = true) { return $this->generate(__FUNCTION__, func_get_args()); }
    public function blank() { return $this->generate(__FUNCTION__, func_get_args()); }
    public function callout($heading, $state = 'info', $content = null) { return $this->generate(__FUNCTION__, func_get_args()); }
    public function container(array $container = []) { return $this->generate(__FUNCTION__, func_get_args()); }
    public function progressBar($value = 0, $state = 'default', $vertical = false) { return $this->generate(__FUNCTION__, func_get_args()); }
    public function HTML($content = '') { return $this->generate(__FUNCTION__, func_get_args()); }
    public function button($content = '', $state = 'default', $tag = 'a', $dropdown = false, $size = '') { return $this->generate(__FUNCTION__, func_get_args()); }
    public function buttonApplication($content = '', $tag = 'a', $icon = '', $badge = '', $badgeBg = 'default') { return $this->generate(__FUNCTION__, func_get_args()); }
    public function buttonSocial($social = '', $content = '', $icon = null) { return $this->generate(__FUNCTION__, func_get_args()); }
    public function buttonGroup(array $container = []) { return $this->generate(__FUNCTION__, func_get_args()); }
    public function buttonDropdown($state = 'default', $size = '') { return $this->generate(__FUNCTION__, func_get_args()); }
    public function dropdown(array $container = []) { return $this->generate(__FUNCTION__, func_get_args()); }
    public function dropdownItem($content = '', $href = '#', $attributes = []) { return $this->generate(__FUNCTION__, func_get_args()); }
    public function dropdownDivider() { return $this->generate(__FUNCTION__, func_get_args()); }
    public function tagContainer($tag = 'div', $class = null) { return $this->generate(__FUNCTION__, func_get_args()); }
    public function infoWidget($heading = '', $content = '', $icon = '', $bg = '') { return $this->generate(__FUNCTION__, func_get_args()); }
    public function submit($value = '', $state = 'primary', $dropdown = false, $size = '', $attributes = []) { return $this->generate(__FUNCTION__, func_get_args()); }
    public function form(array $form = []) { return $this->generate(__FUNCTION__, func_get_args()); }
    public function input() { return $this->generate(__FUNCTION__, func_get_args()); }
    public function email() { return $this->generate(__FUNCTION__, func_get_args()); }
    public function password() { return $this->generate(__FUNCTION__, func_get_args()); }
    public function file() { return $this->generate(__FUNCTION__, func_get_args()); }
    public function checkbox() { return $this->generate(__FUNCTION__, func_get_args()); }

}
