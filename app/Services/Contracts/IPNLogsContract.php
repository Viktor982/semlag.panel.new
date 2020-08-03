<?php

namespace NPDashboard\Services\Contracts;

interface IPNLogsContract
{
    /**
     * @param null $gateway
     * @return mixed
     */
    public function getLogs($gateway = null);
}