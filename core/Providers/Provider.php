<?php


namespace NPCore\Providers;

use NPCore\Hooks\Container;

abstract class Provider
{
    /**
     * @param Container $container
     * @return mixed
     */
    public abstract function boot(Container $container);
}