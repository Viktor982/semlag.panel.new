<?php

namespace NPCore\Http\Controllers;

use NPCore\Http\Request;

abstract class BaseController
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @param Request $request
     */
    public function __invoke(Request $request)
    {
        $this->request = $request;
    }
}