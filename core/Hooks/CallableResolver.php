<?php

namespace NPCore\Hooks;

use Auryn\Injector;
use RuntimeException;
use Psr\Container\ContainerInterface;
use Slim\Interfaces\CallableResolverInterface;

class CallableResolver implements CallableResolverInterface
{
    const CALLABLE_PATTERN = '!^([^\:]+)\@([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)$!';

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * @var Injector
     */
    private $injector;

    /**
     * CallableResolver constructor.
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->injector = $container['ioc'];
    }

    /**
     * @param mixed $toResolve
     * @return array|\Closure
     * @throws \Exception
     */
    public function resolve($toResolve)
    {
        if(is_callable($toResolve)){
            return $toResolve;
        }

        if(preg_match(self::CALLABLE_PATTERN, $toResolve, $matches)){
            $controller = $matches[1];
            $action = $matches[2];

            if(class_exists($controller)) {
                $instance = $this->injector->make($controller);
                return [$instance, $action];
            }

            $prefix = config()['app']['http']['controllers']['defaults']['namespace'];
            if(class_exists($controller = $prefix.$controller)) {
                $instance = $this->injector->make($controller);
                return [$instance, $action];
            }
        }

        throw new RuntimeException("Cannot Solve class {$toResolve}");
    }
}