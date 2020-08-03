<?php

namespace NPDashboard\Providers;

use NPCore\Hooks\Container;
use NPCore\Providers\Provider;
use Illuminate\Database\Capsule\Manager as Capsule;

class EloquentServiceProvider extends Provider
{
    /**
     * @param Container $container
     */
    public function boot(Container $container)
    {
        $connections = config()['database']['connections'];
        $capsule = new Capsule();

        foreach ($connections as $name => $settings) {
            $capsule->addConnection($settings, $name);
        }

        $capsule->setAsGlobal();
        $capsule->bootEloquent();

        $container['database'] = function () use($capsule) {
            return $capsule;
        };
    }
}