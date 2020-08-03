<?php

namespace NPDashboard\Services;

use NPDashboard\Services\Traits\HttpClient;

class MonitoringService
{
    use HttpClient;
    private $monitoring_server = 'http://npmonitor.kicks-ass.org';

    /**
     * @return string
     */
    public function allServers()
    {
        $res = $this->getNpApiClient()->get($this->monitoring_server . '/api/v1/servers');
        return (string)$res->getBody();
    }

    /**
     * @return string
     */
    public function serverAlertsByPeriod()
    {
        if (isset($_GET['t']) && $_GET['t'] == 'now') {
            $query = [
                'query' => [
                    't' => $_GET['t']
                ]
            ];
        } else if (isset($_GET['ts']) && isset($_GET['te'])) {
            $query = [
                'query' => [
                    'ts' => (new \Carbon\Carbon($_GET['ts']))->timestamp,
                    'te' => (new \Carbon\Carbon($_GET['te']))->timestamp
                ]
            ];
        }
        try{
            $res = $this->getNpApiClient()->get($this->monitoring_server.'/api/v1/server-alerts', $query);
            return (string) $res->getBody();
        }catch (\Exception $e)
        {
            return json_encode([]);
        }
    }

    /**
     * @param $id
     * @return string
     */
    public function serverById($id)
    {
        $res = $this->getNpApiClient()->get($this->monitoring_server . '/api/v1/server/' . $id);
        return (string)$res->getBody();
    }

    /**
     * @param $request
     * @return string
     */
    public function setServerPosition($request)
    {
        $id = $request['id'];
        $query = [
            'lat' => base64_encode($request['lat']),
            'lng' => base64_encode($request['lng']),
            'location' => $request['location']
        ];
        $res = $this->getNpApiClient()->post($this->monitoring_server . '/api/v1/server/' . $id . '/set-position', ['form_params' => $query]);
        return (string)$res->getBody();
    }
}