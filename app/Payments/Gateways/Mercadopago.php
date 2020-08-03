<?php

namespace NPDashboard\Payments\Gateways;

use NPCore\Payments\Gateways\AbstractGateway;
use NPCore\Payments\Gateways\Contracts\GatewayContract;
use NPDashboard\Models\Plan;
use NPDashboard\Models\Sale;
use NPDashboard\Models\Subscription;

class Mercadopago extends AbstractGateway implements GatewayContract
{

    protected $gateway_id = 5;

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
        return \Cache::remember('mp-available-balance', 5, function () {
            $instance = $this->getInstance();
            $query = $instance->get("/users/209633757/mercadopago_account/balance");
            return "R$ ".$query["response"]["available_balance"];
        });
    }

    /**
     * @return string
     */
    public function getBlockedBalance()
    {
        return \Cache::remember('mp-unavailable-balance', 5, function () {
            $instance = $this->getInstance();
            $query = $instance->get("/users/209633757/mercadopago_account/balance");
            return "R$ ".$query["response"]["unavailable_balance"];
        });
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
     * @return \MP
     */
    private function getInstance()
    {
        $token = env('MP_ACCESS_TOKEN');
        return (new \MP($token));
    }

    /**
     * @param Plan $plan
     */
    public function updateRecurringPlan(Plan $plan)
    {
        $instance = $this->getInstance();
        $mpPlan = $instance->post("/v1/plans",[
            'description' => $plan->nome,
            'auto_recurring' => [
                'frequency' => (int) $plan->frequency,
                'frequency_type' => "days",
                'transaction_amount' => (float) $plan->recurringPriceForCurrency($this->currency)
            ]
        ]);
        $id = $mpPlan['response']['id'];
        $this->setGatewayPlanId($plan, $id);
    }
}