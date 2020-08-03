<?php

namespace NPDashboard\Providers;

use NPCore\Hooks\Container;
use NPCore\Providers\Provider;
use NPDashboard\Exceptions\Handler;

class ExceptionHandlerServiceProvider extends Provider
{
    /**
     * @param Container $container
     */
    public function boot(Container $container)
    {
        $container['errorHandler'] = function ($c) {
            return function ($request, $response, $exception) {
                $handler = new Handler();
                return $handler->handle($request, $response, $exception);
            };
        };
        $container['phpErrorHandler'] = function ($c) {
            return $c['errorHandler'];
        };
    }
}