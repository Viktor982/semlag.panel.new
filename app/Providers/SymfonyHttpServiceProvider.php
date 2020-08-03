<?php

namespace NPDashboard\Providers;

use NPCore\Hooks\Container;
use NPCore\Providers\Provider;
use Symfony\Component\HttpFoundation\Request;

class SymfonyHttpServiceProvider extends Provider
{
    /**
     * @param Container $container
     */
    public function boot(Container $container)
    {
        $request = Request::createFromGlobals();
        $container['httpRequest'] = function () use($request){
            return $request;
        };
    }
}