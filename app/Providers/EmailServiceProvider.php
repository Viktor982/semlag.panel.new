<?php

namespace NPDashboard\Providers;

use NPCore\Hooks\Container;
use NPCore\Providers\Provider;

class EmailServiceProvider extends Provider
{
    /**
     * @param Container $container
     * @throws \Exception
     */
    public function boot(Container $container)
    {
        $driverClass =  config()['email']['driver'];
        $driver = new $driverClass;

        if(! $driver instanceof \NPCore\Email\Drivers\Contracts\EmailDriverContract)
            throw new \Exception("Email driver must instance of NPCore\\Email\\Drivers\\Contracts\\EmailDriverContract");

        $container['email'] = function () use($driver){
            return $driver;
        };
    }
}