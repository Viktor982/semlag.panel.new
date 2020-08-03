<?php

namespace NPDashboard\Services;

use GuzzleHttp\Client;
use NPDashboard\Services\Contracts\SalesServiceContract;
use NPDashboard\Models\Sale;

class NotificationService
{
    /**
     * @var Client
     */
    private $client;

    /**
     * SalesService constructor.
     */
    public function __construct()
    {
        $this->client = new Client();
    }


    public function getNotifications()
    {
        $request = $this->client->request('GET', 'http://aux6.scutumnet.com/api/notification/public/notification');

        return (string)$request->getBody();
    }

    public function storeNotification(array $notification)
    {
        $request = $this->client->request('POST', 'http://aux6.scutumnet.com/api/notification/public/notification', $notification);

        return (string)$request->getBody();
    }
}