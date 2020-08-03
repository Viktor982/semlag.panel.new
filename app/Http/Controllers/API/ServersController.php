<?php

namespace NPDashboard\Http\Controllers\API;

use NPDashboard\Http\Controllers\Controller;
use NPDashboard\Services\MonitoringService;
use NPDashboard\Repositories\ServerRankingRepository;
use NPDashboard\Repositories\Bridge\InfoRepository;

class ServersController extends Controller
{
    /**
     * @param MonitoringService $service
     * @return string
     */
    public function all(MonitoringService $service)
    {
        return $service->allServers();
    }

    /**
     * @param MonitoringService $service
     * @return mixed
     */
    public function byId(MonitoringService $service)
    {
        $id = $this->request->all()['id'];
        return $service->serverById($id);
    }

    /**
     * @param MonitoringService $service
     * @return mixed
     */
    public function setPosition(MonitoringService $service)
    {
        return $service->setServerPosition($this->request->all());
    }

    public function updateServersInfo(ServerRankingRepository $repository, InfoRepository $info_repository)
    {
        $servers = $info_repository->getUsage();
        foreach ($servers as $key => $value) {
            $done = $repository->setServerRecords($value);
        }
    }

    public function updateServersRanking(ServerRankingRepository $repository)
    {
        $repository->setRanking();
    }
}