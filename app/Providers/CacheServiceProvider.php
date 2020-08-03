<?php

namespace NPDashboard\Providers;

use NPCore\Hooks\Container;
use NPCore\Providers\Provider;
use Illuminate\Cache\CacheManager;

class CacheServiceProvider extends Provider
{
    /**
     * @param Container $container
     */
    public function boot(Container $container)
    {
        $manager = new CacheManager($container['illuminateContainer']);
        $container['cache'] = function () use($manager) {
            return $manager->store();
        };
    }
}