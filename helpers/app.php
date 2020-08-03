<?php

if(! function_exists('np')){
    /**
     * @param null $service
     * @return \Slim\App
     * @throws Exception
     */
    function np($service = null)
    {
        if($service === null){
            return \NPCore\AppCapsule::getInstance();
        }

        $container = \NPCore\AppCapsule::getInstance()->getContainer();

        if($container->has($service)){
            return $container[$service];
        }
        throw new \Exception("Service dosn't exists!");
    }
}

if(! function_exists('container')){
    /**
     * @return \Psr\Container\ContainerInterface
     */
    function container()
    {
        return \NPCore\AppCapsule::getInstance()->getContainer();
    }
}

if(! function_exists('manifest')) {
    /**
     * @param $asset
     * @return string
     */
    function manifest($asset)
    {
        if(file_exists($file = NP_PATH.'/public'.$asset.'.npmanifest.json')) {
            $obj = json_decode(file_get_contents($file));
            $path = preg_replace('/(.*\/).*/', '\\1', $file);
            return str_replace(NP_PATH.'/public', '', $path.$obj->file);
        }
        return $asset;
    }
}