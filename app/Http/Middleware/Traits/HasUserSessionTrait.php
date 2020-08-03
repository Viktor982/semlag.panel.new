<?php


namespace NPDashboard\Http\Middleware\Traits;


trait HasUserSessionTrait
{
    /**
     * @return bool
     */
    private function hasUserSession()
    {
        return \Session::has('user');
    }
}