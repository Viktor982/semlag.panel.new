<?php

if(! function_exists('cache')){
    /**
     * @return \Illuminate\Cache\CacheManager
     */
    function cache()
    {
        return \NPCore\AppCapsule::getInstance()
            ->getContainer()['cache'];
    }
}

class Cache
{
    private static function instance()
    {
        return \NPCore\AppCapsule::getInstance()
            ->getContainer()['cache'];
    }
    /**
     * @param $name
     * @param $time
     * @param Closure $closure
     * @return mixed
     */
    public static function remember($name, $time, Closure $closure)
    {
        return self::instance()->remember($name, $time, $closure);
    }
}