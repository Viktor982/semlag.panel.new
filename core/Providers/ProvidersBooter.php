<?php


namespace NPCore\Providers;

use NPCore\Hooks\Container;

class ProvidersBooter
{
    /**
     * ProvidersBooter constructor.
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function boot()
    {
        foreach (config()['providers'] as $provider) {
            $instance = new $provider;
            $instance->boot($this->container);
        }
    }
}