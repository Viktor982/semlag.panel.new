<?php

namespace NPDashboard\Payments\Gateways;

use NPCore\Payments\Gateways\AbstractGateway;

use NPCore\Payments\Gateways\Contracts\GatewayContract;
use NPDashboard\Models\Plan;
use NPDashboard\Models\Sale;
use NPDashboard\Models\Subscription;

class Stripe extends AbstractGateway implements GatewayContract
{
    protected $gateway_id = 11;
    protected $currency = 2;

    private function setCredentials()
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
    }

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
        return \Cache::remember('stripe-balance', 5, function () {
            $this->setCredentials();
            return "$ ".\Stripe\Balance::retrieve()->available[0]->amount / 100;
        });
    }

    /**
     * @return string
     */
    public function getBlockedBalance()
    {
        return \Cache::remember('stripe-blocked-balance', 5, function () {
            $this->setCredentials();
            return "$ ".\Stripe\Balance::retrieve()->pending[0]->amount / 100;
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
     * @param Plan $plan
     */
    public function updateRecurringPlan(Plan $plan)
    {
        $this->setCredentials();
        $stripePlan = \Stripe\Plan::create(array(
            "name" => $plan->nome,
            "id" => str_slug($plan->nome).date("h-i-Y").str_random(5),
            "interval" => "day",
            "currency" => "usd",
            "interval_count" => $plan->frequency,
            "amount" => $plan->recurringPriceForCurrency($this->currency) * 100,
        ));
        $id = $stripePlan->id;
        $this->setGatewayPlanId($plan, $id);
    }
}