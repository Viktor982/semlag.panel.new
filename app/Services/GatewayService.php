<?php

namespace NPDashboard\Services;

use GuzzleHttp\Client;
use NPDashboard\Services\Contracts\IPNLogsContract;

class GatewayService implements IPNLogsContract
{
    private $client;

    /**
     * GatewayService constructor.
     */
    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * @param null $gateway
     * @return string
     */
    public function getLogs($gateway = null)
    {
        $id = \Session::get('user')->id;
        $pass = \Session::get('user')->password;
        $request = $this->client->request('POST', 'http://huehue.haha.bololo.nptunnel.com/stats/access/' . $gateway, [
            'query' => ['user_id' => $id, 'password' => $pass]
        ]);

        return (string)$request->getBody();
    }
}
