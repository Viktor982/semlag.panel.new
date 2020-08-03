<?php

use Symfony\Component\HttpFoundation\Cookie;
use Illuminate\Session\SessionManager;

class Session
{
    /**
     * @param $key
     * @return bool
     */
    public static function has($key)
    {
        return self::manager()->has($key);
    }

    /**
     * @param $key
     * @param $value
     * @return bool
     */
    public static function put($key, $value)
    {
        self::manager()->put($key, $value);
        return self::manager()->save();
    }

    /**
     * @param $key
     * @return mixed
     */
    public static function get($key)
    {
        return self::manager()->get($key);
    }

    /**
     * @param $key
     * @param $value
     */
    public static function flash($key, $value)
    {
        self::manager()->flash($key, $value);
        self::manager()->save();
    }

    /**
     * @return \Illuminate\Session\Store
     */
    private static function manager()
    {
        return \NPCore\AppCapsule::session();
    }

    /**
     * @param $key
     * @return bool
     */
    public static function forget($key)
    {
        self::manager()->forget($key);
        return self::manager()->save();
    }

    /**
     * @return bool
     */
    public static function flush()
    {
        self::manager()->flush();
        return self::manager()->save();
    }
}