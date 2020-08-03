<?php

namespace NPDashboard\Providers;

use NPCore\Hooks\Container;
use NPCore\Providers\Provider;
use Illuminate\Pagination\Paginator;

class IlluminatePaginateServiceProvider extends Provider
{
    /**
     * @param Container $container
     */
    public function boot(Container $container)
    {
        Paginator::currentPathResolver(function (){
            return isset($_SERVER['REQUEST_URI']) ? strtok($_SERVER['REQUEST_URI'], '?') : '/';
        });

        Paginator::currentPageResolver(function ($pageName = 'page'){
            $page = isset($_REQUEST[$pageName]) ? $_REQUEST[$pageName] : 1;
            return $page;
        });

        Paginator::viewFactoryResolver(function () use($container){
            return $container['illuminateContainer']['view'];
        });

        Paginator::$defaultView = 'vendor.pagination.default';
    }
}