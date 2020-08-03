<?php


namespace NPCore\Http\ACL;


abstract class RoleValidation
{
    public function __construct()
    {
        if (method_exists($this, 'need')) {
            $needed = $this->need();
            $needed = array_map(function ($item) {
                return can($item);
            }, $needed);
            if (in_array(false, $needed)) {
                exit(view('pages.errors.notAllowed'));
            }
        }
        if (method_exists($this, 'atLeast')) {
            $needed = $this->atLeast();
            $needed = array_map(function ($item) {
                return can($item);
            }, $needed);
            if (! in_array(true, $needed)) {
                exit(view('pages.errors.notAllowed'));
            };
        }
    }
}