<?php

namespace NPCore\Hooks;

use NPCore\AppCapsule;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Interfaces\InvocationStrategyInterface;

class RequestResponse implements InvocationStrategyInterface
{
    /**
     * @param callable $callable
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @param array $routeArguments
     * @return ResponseInterface
     */
    public function __invoke(
        callable $callable,
        ServerRequestInterface $request,
        ResponseInterface $response,
        array $routeArguments
    )
    {
        $nprequest = \NPCore\Http\Request::createFromSlimRequest($request, $routeArguments);
        AppCapsule::getContainer()['nprequest'] = function () use($nprequest) {
            return $nprequest;
        };
        if(is_array($callable)) {
            $callable[0]($nprequest);
        }

        $injector = AppCapsule::getContainer()->get('ioc');
        $call = $injector->execute($callable);

        if($call instanceof \NPCore\Http\Response) {
            $response = $response->withStatus($call->getStatusCode());

            foreach ($call->getHeaders() as $headerName => $headerValue) {
                $response = $response->withHeader($headerName, $headerValue);
            }

            $response->getBody()->write((string) $call->getBody());
        }

        if($call instanceof \Illuminate\View\View || is_string($call)) {
            $response->getBody()->write((string) $call);
        }

        if($call instanceof \NPCore\Http\Redirect){
            return $response->withRedirect($call->to);
        }

        if(is_array($call)) {
            $response->getBody()->write(\GuzzleHttp\json_encode($call));
        }

        return $response;
    }
}