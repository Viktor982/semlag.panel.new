<?php


namespace NPDashboard\Services\Traits;

use GuzzleHttp\Client;

trait HttpClient
{
    /**
     * @return Client
     */
    public function getNpInfraClient()
    {
        $options = [
            'headers' => [
                'xauth' => '332b0af82a53c01b860ff663d0b0cbae',
//                'Content-Type' => 'application/json'
            ]
        ];
        $client = new Client($options);
        return $client;
    }

    /**
     * @return Client
     */
    public function getHttpClient()
    {
        return (new Client);
    }

    /**
     * @return Client
     */
    public function getNpApiClient()
    {
        $user = authenticated();
        $client = new Client([
            'headers' => [
                'npuser' => $user->username,
                'npassw' => $user->password
            ]
        ]);
        return $client;
    }

    public function getNpIpClient()
    {
        $options = [
            'base_uri' => 'http://npip.nptunnel.com/',
            'headers' => [
//                https://github.com/1ncrivelSistemas/npip.nptunnel.com/blob/master/readme.md
                'npkey' => 'fc27c81f2091127702c3dab9059d73e3'
            ]
        ];
        return (new Client($options));
    }
}