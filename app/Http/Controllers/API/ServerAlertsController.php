<?php

namespace NPDashboard\Http\Controllers\API;

use NPDashboard\Http\Controllers\Controller;
use NPDashboard\Services\MonitoringService;

class ServerAlertsController extends Controller
{
    /**
     * @param MonitoringService $service
     * @return string
     */
    public function byPeriod(MonitoringService $service)
    {
       return $service->serverAlertsByPeriod($this->request);
    }
}