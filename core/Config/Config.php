<?php


namespace NPCore\Config;

use NPCore\Config\ConfigArray;

class Config
{
    /**
     * @var ConfigArray
     */
    private static $instance;

    private function __construct()
    {

    }

    /**
     * @return \NPCore\Config\ConfigArray
     */
    public static function getInstance()
    {
        if(! isset(self::$instance)) {
            $arr = new ConfigArray();
            foreach (glob(PREFIX_PATH.'config/*.php') as $confFile){
                $file =  require $confFile;
                $arr[explode(PREFIX_PATH.'config/', explode('.php', $confFile)[0])[1]] = require $confFile;
            }
            self::$instance = $arr;
        }
        return self::$instance;
    }
}