<?php

if(! function_exists('route')){
    /**
     * @param $routeName
     * @param array $parameters
     * @return string
     */
    function route($routeName, $parameters = [])
    {
        $router = \NPCore\AppCapsule::router();
        $request = \NPCore\AppCapsule::request();

        return (($request->isSecure()) ? 'https://' : 'http://').$request->server->get('HTTP_HOST').$router->pathFor($routeName, $parameters);
    }
}

if(! function_exists('aroute')){
    /**
     * @param $content
     * @param $route
     * @param array $parameters
     * @param array $classes
     * @return string
     */
    function aroute($content, $route, $parameters = [], $classes = [])
    {
        $url        = route($route, $parameters);
        $_classes   = implode(' ', $classes);
        return '<a href="'.$url.'"'.(($_classes) ? ' class="'.$_classes.'"' : null).'>'.$content.'</a>';
    }
}

if(! function_exists('current_url')) {
    /**
     * @return string
     */
    function current_url()
    {
        return (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    }
}