<?php

namespace NPDashboard\Providers;

use NPCore\Hooks\Container;
use NPCore\Providers\Provider;
use Illuminate\Filesystem\Filesystem;

class IlluminateFileSystemServiceProvider extends Provider
{
    /**
     * @param Container $container
     */
    public function boot(Container $container)
    {
        $fileSystem = new Filesystem();
        $container['illuminateContainer']['files'] = function () use($fileSystem) {
            return $fileSystem;
        };
    }
}