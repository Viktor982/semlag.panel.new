<?php

namespace NPDashboard\Providers;

use NPCore\Hooks\Container;
use NPCore\Providers\Provider;
use NPCore\Captcha\CaptchaManager;

class CaptchaServiceProvider extends Provider
{
    /**
     * @param Container $container
     */
    public function boot(Container $container)
    {
        $container['captcha'] = function () {
            return (new CaptchaManager());
        };
    }
}