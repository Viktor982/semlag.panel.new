<?php

namespace NPCore;

use Auryn\Injector;
use NPCore\Captcha\CaptchaManager;
use NPCore\Email\Drivers\Contracts\EmailDriverContract;
use Slim\App;
use Illuminate\Container\Container as IlluminateContainer;
use Illuminate\View\Factory;
use Illuminate\Cache\CacheManager;
use Symfony\Component\HttpFoundation\Request;
use Slim\Interfaces\RouterInterface;
use Illuminate\Validation\Factory as ValidationFactory;

class AppCapsule
{
    /**
     * @var App
     */
    private static $app;

    /**
     * AppCapsule constructor.
     */
    private function __construct()
    {

    }

    /**
     * @param App $instance
     * @throws \Exception
     */
    public static function setAppInstance(App $instance)
    {
        if(self::$app instanceof App){
            throw new \Exception("Already set app instance..");
        }
        self::$app = $instance;
    }

    /**
     * @return App
     */
    public static function getInstance()
    {
        return self::$app;
    }

    /**
     * @return \Psr\Container\ContainerInterface
     */
    public static function getContainer()
    {
        return self::$app->getContainer();
    }

    /**
     * @return IlluminateContainer
     */
    public static function getIlluminateContainer()
    {
        $container = self::getContainer();
        return $container['illuminateContainer'];
    }

    /**
     * @return Store
     */
    public static function session()
    {
        $container = self::getContainer();
        return $container['session'];
    }

    /**
     * @return Factory
     */
    public static function view()
    {
        $container = self::getIlluminateContainer();
        return $container['view'];
    }

    /**
     * @return CacheManager
     */
    public static function cache()
    {
        $container = self::getIlluminateContainer();
        return $container['cache'];
    }

    /**
     * @return Request
     */
    public static function request()
    {
        $container = self::getContainer();
        return $container['httpRequest'];
    }

    /**
     * @return RouterInterface
     */
    public static function router()
    {
        $container = self::getContainer();
        return $container['router'];
    }

    /**
     * @return EmailDriverContract
     */
    public static function mailer()
    {
        $container = self::getContainer();
        return $container['email'];
    }

    /**
     * @return CaptchaManager
     */
    public static function captcha()
    {
        $container = self::getContainer();
        return $container['captcha'];
    }

    /**
     * @return Injector
     */
    public static function ioc()
    {
        $container = self::getContainer();
        return $container->get('ioc');
    }

    /**
     * @return ValidationFactory
     */
    public static function validation()
    {
        $container = self::getContainer();
        return $container['validation'];
    }

    /**
     * @return mixed
     */
    public static function database()
    {
        $container = self::getContainer();
        return $container['database'];
    }
}