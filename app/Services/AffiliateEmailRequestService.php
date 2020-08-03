<?php

namespace NPDashboard\Services;

use NPDashboard\Services\Traits\HttpClient;

class AffiliateEmailRequestService
{
    use HttpClient;

    /**
     * @param $id
     * @return mixed
     */
    public function getTranslate($id)
    {
        $request = $this->getNpApiClient()->post('https://nptunnel.com/api/v3/affiliate-renew-translate', [
            'form_params' => [
                'id' => $id
            ]
        ]);
        $response = $request->getBody();
        return json_decode($response->__toString());
    }
}