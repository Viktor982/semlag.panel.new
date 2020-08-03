<?php

namespace NPDashboard\Services;

use DavidePastore\Ipinfo\Ipinfo;

class IpInfoService
{
    /**
     * @var Ipinfo
     */
    private $api;

    /**
     * IpInfoService constructor.
     */
    public function __construct()
    {
        $this->api = new Ipinfo([
            'token' => env('IPINFO_KEY')
        ]);
    }

    /**
     * @param $ip
     * @return mixed
     */
    public function info($ip)
    {
        return \Cache::remember("ip-info-{$ip}", 60*24, function () use($ip){
            return $this->api->getFullIpDetails($ip)->getProperties();
        });
    }
}