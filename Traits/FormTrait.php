<?php

namespace Vitlabs\GUIAdminLTE\Traits;

trait FormTrait {

    public function form(array $form = []) { return $this->generate(__FUNCTION__, func_get_args()); }
    public function submit($value = '', $state = 'primary', $dropdown = false, $size = '', $attributes = []) { return $this->generate(__FUNCTION__, func_get_args()); }
    public function input() { return $this->generate(__FUNCTION__, func_get_args()); }
    public function email() { return $this->generate(__FUNCTION__, func_get_args()); }
    public function password() { return $this->generate(__FUNCTION__, func_get_args()); }
    public function file() { return $this->generate(__FUNCTION__, func_get_args()); }
    public function checkbox() { return $this->generate(__FUNCTION__, func_get_args()); }
    public function textarea() { return $this->generate(__FUNCTION__, func_get_args()); }
    public function editor() { return $this->generate(__FUNCTION__, func_get_args()); }
    public function radio() { return $this->generate(__FUNCTION__, func_get_args()); }
    public function select() { return $this->generate(__FUNCTION__, func_get_args()); }

}
