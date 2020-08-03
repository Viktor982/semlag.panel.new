<?php

namespace NPDashboard\Providers;

use NPCore\Hooks\Container;
use NPCore\Providers\Provider;
use NPCore\Hooks\CallableResolver;

class CallableResolverServiceProvider extends Provider
{
    /**
     * @param Container $container
     */
    public function boot(Container $container)
    {
        $callableResolver = new CallableResolver($container);
        $container['callableResolver'] = function () use($callableResolver) {
            return $callableResolver;
        };
    }
}