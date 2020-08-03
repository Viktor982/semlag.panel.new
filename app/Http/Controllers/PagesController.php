<?php

namespace NPDashboard\Http\Controllers;

use GuzzleHttp\Exception\GuzzleException;
use NPDashboard\Http\Controllers\Controller;
use GuzzleHttp\Client;

class PagesController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\View
     * @throws GuzzleException
     */
    public function home()
    {
        $client = new Client();
        $res = $client->request('GET', 'http://economia.awesomeapi.com.br/USD-BRL/1');
        $quotationJson = (string)$res->getBody();
        $json_ = json_decode($quotationJson);
        return view('pages.home', ['quotationData' => $json_[0]]);
    }
}