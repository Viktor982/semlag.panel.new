<?php

namespace NPDashboard\Http\Middleware;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use NPDashboard\Http\Middleware\Traits\HasUserSessionTrait;

class AuthenticateMiddleware
{
    use HasUserSessionTrait;

    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @param $next
     * @return ResponseInterface
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, $next)
    {
        if(! $this->hasUserSession()){
            return $response->withRedirect(route('auth.login').'?redirect='.fullUrl());
        }

        \NPCore\AppCapsule::view()->share('authenticated', \Session::get('user'));

        if(! $next){
            return $response;
        }

        return $response = $next($request, $response);
    }
}