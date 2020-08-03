<?php

namespace NPCore\Hooks;

use NPCore\AppCapsule;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Container as SlimContainer;
use NPCore\Providers\ProvidersBooter;
use NPCore\Hooks\RequestResponse;
use Auryn\Injector;

class Container extends SlimContainer
{
    /**
     * Container constructor.
     * @param array $values
     */
    public function __construct(array $values = [])
    {
        $this->bootIOC();
        $this->bootRequestResponse();
        $booter = new ProvidersBooter($this);
        $booter->boot();
        parent::__construct($values);
    }

    private function bootIOC()
    {
        $injector = new Injector();

        $injector->delegate(ServerRequestInterface::class, function (){
            return AppCapsule::getContainer()->get('request');
        });

        $injector->delegate(ResponseInterface::class, function (){
            return AppCapsule::getContainer()->get('response');
        });

        $this['ioc'] = function () use ($injector){
            return $injector;
        };
    }

    private function bootRequestResponse()
    {
        $this['foundHandler'] = function () {
            return new RequestResponse();
        };
    }
}