<?php

if(! function_exists('np_log')) {
    /**
     * @param $action
     * @param array $params
     */
    function np_log($action, array $params = [])
    {
        \NPDashboard\Logger\Logger::log($action, $params);
    }
}