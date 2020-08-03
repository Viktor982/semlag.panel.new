<?php


namespace NPDashboard\Services;

use NPDashboard\Services\Traits\HttpClient;

class MaintenanceService
{
    use HttpClient;

    const BASE_URL = 'https://www.nptunnel.com/api/';

    /**
     * @return mixed
     */
    public function getStatus()
    {
        $request = $this->getNpApiClient()->get(MaintenanceService::BASE_URL . 'public/status');
        $response = (string)$request->getBody();
        return json_decode($response);
    }

    /**
     * @return string
     */
    public function changeStatus($ip)
    {
        $request = $this->getNpApiClient()
            ->post(MaintenanceService::BASE_URL . '_blazter/set-status', [
                'form_params' => [
                    'ip' => $ip
                ]
            ]);
        $response = (string)$request->getBody();

        return $response;
    }
}