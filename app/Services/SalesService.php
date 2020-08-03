<?php

namespace NPDashboard\Services;

use GuzzleHttp\Client;
use NPDashboard\Services\Contracts\SalesServiceContract;
use NPDashboard\Models\Sale;

class SalesService implements SalesServiceContract
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

    /**
     * @param Sale $sale
     * @param $status
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function updateStatus(Sale $sale, $status)
    {

        $id = \Session::get('user')->id;
        $pass = \Session::get('user')->password;

        $request = $this->client->request('POST', 'http://huehue.haha.bololo.nptunnel.com/ipn/nptunnel/sale/' . $sale->id . '/update', [
            'query' => ['user_id' => $id, 'password' => $pass, 'status' => $status]
        ]);

        return $request;
    }

    /**
     * @param Sale $sale
     */
    public function removeSaleDays(Sale $sale)
    {
        $vipService = new VipService();

        $vipService->removePlanDays($sale->customer(), $sale->plan());
    }

    public function addQuote(Sale $sale)
    {
        // TODO: Implement addQuote() method.
    }

    public function getStatusChangeHistory(Sale $sale)
    {
        // TODO: Implement getStatusChangeHistory() method.
    }
}