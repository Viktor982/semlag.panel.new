<?php

namespace NPDashboard\Payments\Gateways;

use NPCore\Payments\Gateways\AbstractGateway;
use NPCore\Payments\Gateways\Contracts\GatewayContract;
use NPDashboard\Models\Plan;
use NPDashboard\Models\Sale;
use NPDashboard\Models\Subscription;

use PayPal\PayPalAPI\GetBalanceReq;
use PayPal\PayPalAPI\GetBalanceRequestType;
use PayPal\Service\PayPalAPIInterfaceServiceService;

class Paypal extends AbstractGateway implements GatewayContract
{

    public function getPurchaseStatusChangeHistory(Sale $sale)
    {
        // TODO: Implement getPurchaseStatusChangeHistory() method.
    }

    public function getSubscriptionStatusChangeHistory(Subscription $subscription)
    {
        // TODO: Implement getSubscriptionStatusChangeHistory() method.
    }

    public function getSubscriptionsSalesWithStatus(Subscription $subscription)
    {
        // TODO: Implement getSubscriptionsSalesWithStatus() method.
    }

    /**
     * @return string
     */
    public function getBalance()
    {
        return \Cache::remember('available-balance-paypal', 5, function (){
            $getBalanceRequest = new GetBalanceRequestType();
            $getBalanceRequest->ReturnAllCurrencies = 0;
            $getBalanceReq = new GetBalanceReq();
            $getBalanceReq->GetBalanceRequest = $getBalanceRequest;
            $paypalService = new PayPalAPIInterfaceServiceService($this->getMerchantConfigs());
            $getBalanceResponse = $paypalService->GetBalance($getBalanceReq);
            return "$ ".$getBalanceResponse->Balance->value;
        });
    }

    /**
     * @return string
     */
    public function getBlockedBalance()
    {
        return "indisponível";
    }

    public function getSalesByPeriod($date, $period)
    {
        // TODO: Implement getSalesByPeriod() method.
    }

    public function getSalesCountByPeriod($date, $period)
    {
        // TODO: Implement getSalesCountByPeriod() method.
    }

    public function getIpnHistory($date, $period)
    {
        // TODO: Implement getIpnHistory() method.
    }

    /**
     * @return array
     */
    private function getMerchantConfigs()
    {
        return [
            "acct1.UserName" => env('PP_USERNAME'),
            "acct1.Password" => env('PP_PASSWORD'),
            "acct1.Signature" => env('PP_SIGNATURE'),
            "mode" => "live"
        ];
    }

    public function updateRecurringPlan(Plan $plan)
    {
        // TODO: Implement updateRecurringPlan() method.
    }
}