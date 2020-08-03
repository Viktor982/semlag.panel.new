<?php

namespace NPDashboard\Payments\Gateways;

use NPCore\Payments\Gateways\AbstractGateway;
use NPCore\Payments\Gateways\Contracts\GatewayContract;
use NPDashboard\Models\Plan;
use NPDashboard\Models\Sale;
use NPDashboard\Models\Subscription;

class Pagarme extends AbstractGateway  implements GatewayContract
{

    protected $gateway_id = 14;
    protected $currency = 1;

    /**
     * @return \PagarMe\Sdk\PagarMe
     */
    private function getInstance()
    {
        $key = env('PAGARME_API');
        return (new \PagarMe\Sdk\PagarMe($key));
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
        return \Cache::remember('pagarme-balance', 5, function () {
            $pm = $this->getInstance();
            return "R$ ".number_format($pm->balance()->get()->getAvailable()->amount / 100, 2);
        });
    }

    /**
     * @return string
     */
    public function getBlockedBalance()
    {
        return \Cache::remember('pagarme-balance-blocked', 5, function () {
            $pm = $this->getInstance();
            return "R$ ".number_format($pm->balance()->get()->getWaitingFunds()->amount / 100, 2);
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
        $pmPlan = $this->getInstance()
            ->plan()
            ->create(
                $plan->recurringPriceForCurrency($this->currency) * 100,
                $plan->frequency,
                $plan->nome,
                0,
                ['credit_card'],
                null,
                1
            );
        $this->setGatewayPlanId($plan, $pmPlan->getId());
    }
}