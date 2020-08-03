<?php

namespace NPDashboard\Services;

use NPDashboard\Services\Traits\HttpClient;

class CacheService
{
    use HttpClient;

    const BASE_NP_URL = 'https://www.nptunnel.com/api/';
    const CF_BASE_URL = 'https://api.cloudflare.com/';

    /**
     * @return array
     */
    public function clearBoth()
    {
        $this->clearCloudflare();
        $this->clearSite();
        $this->clearDashboard();
        return ['success' => true];
    }

    /**
     * @return mixed
     */
    public function clearSite()
    {
        $request = $this->getNpApiClient()->get(CacheService::BASE_NP_URL . '_blazter/cache');
        $response = (string)$request->getBody();
        $status = json_decode($response, true);
        return $status;
    }

    /**
     * @return array
     */
    public function clearCloudflare()
    {
        try {
            $configs = config()['cloudflare'];
            $url = CacheService::CF_BASE_URL . '/client/v4/zones';
            $client = $this->getHttpClient();
            $zoneIdQuery = $client->request('GET', $url, [
                'headers' => [
                    'X-Auth-Email' => $configs['email'],
                    'X-Auth-Key' => $configs['key'],
                ],
                'query' => [
                    'name' => 'nptunnel.com',
                    'status' => 'active',
                    'match' => 'all'
                ]
            ]);
            $zoneIdResponse = json_decode((string)$zoneIdQuery->getBody());
            $zoneId = $zoneIdResponse->result[0]->id;
            $purgeRequest = $client->request('DELETE', CacheService::CF_BASE_URL . "client/v4/zones/{$zoneId}/purge_cache", [
                'headers' => [
                    'X-Auth-Email' => $configs['email'],
                    'X-Auth-Key' => $configs['key'],
                ],
                'json' => [
                    'purge_everything' => true
                ]
            ]);
            $response = json_decode((string)$purgeRequest->getBody());

            return [
                'success' => $response->result->success
            ];
        } catch (\Exception $e) {
            return ['success' => false];
        }
    }

    public function clearDashboard()
    {

    }
}