<?php

namespace NPCore\Http;

use NPCore\AppCapsule;

class Redirect
{
    /**
     * @var string
     */
    public $to;

    /**
     * Redirect constructor.
     * @param bool $route
     * @param array $routeParameters
     */
    public function __construct($route = false, array $routeParameters = [])
    {
        if($route) {
            $this->to = route($route, $routeParameters);
        }
    }

    /**
     * @param $url
     * @return $this
     */
    public function to($url)
    {
        $this->to = $url;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->to;
    }
}