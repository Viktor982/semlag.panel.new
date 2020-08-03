<?php

namespace NPDashboard\Providers;

use NPCore\Hooks\Container;
use NPCore\Providers\Provider;
use Illuminate\Container\Container as IlluminateContainer;

class IlluminateContainerServiceProvider extends Provider
{
    /**
     * @param Container $container
     */
    public function boot(Container $container)
    {
        $illuminateContainer = new IlluminateContainer;
        $illuminateContainer->bind('app', $illuminateContainer);
        $illuminateContainer['config'] = $this->illuminateContainerConfigs();
        $container['illuminateContainer'] = function () use($illuminateContainer) {
            return $illuminateContainer;
        };
    }

    /**
     * @return array
     */
    private function illuminateContainerConfigs()
    {
        return [
            'cache.default' => 'file',
            'cache.stores.file' => [
                'driver' => config()['cache']['driver'],
                'path' => config()['cache']['compiled']
            ],
        ];
    }
}