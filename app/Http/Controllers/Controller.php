<?php

namespace NPDashboard\Http\Controllers;

use Interop\Container\ContainerInterface;
use NPCore\AppCapsule;
use NPCore\Http\Controllers\BaseController;

abstract class Controller extends BaseController
{
    /**
     * @param $view
     * @param array $data
     * @return \Illuminate\Contracts\View\View
     */
    protected function view($view, array $data = [])
    {
        return AppCapsule::view()
            ->make($view, $data);
    }

    /**
     * @return \Psr\Container\ContainerInterface
     */
    protected function container()
    {
        return AppCapsule::getContainer();
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Request
     */
    protected function request()
    {
        return AppCapsule::request();
    }

    /**
     * @return bool
     */
    protected function validateCaptcha()
    {
        return AppCapsule::captcha()
            ->validate();
    }
}