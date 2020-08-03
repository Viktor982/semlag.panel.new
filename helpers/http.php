<?php

if(! function_exists('redirect')) {
    /**
     * @param bool $route
     * @param array $routeParameters
     * @return \NPCore\Http\Redirect
     */
    function redirect($route = false, array $routeParameters = [])
    {
        return (new \NPCore\Http\Redirect($route, $routeParameters));
    }
}

if(! function_exists('response')) {
    /**
     * @param $body
     * @param int $statusCode
     * @param array $headers
     * @return \NPCore\Http\Response
     */
    function response($body, $statusCode = 200, $headers = [])
    {
        return (new \NPCore\Http\Response((string) $body, $statusCode, $headers));
    }
}