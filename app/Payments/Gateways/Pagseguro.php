<?php

namespace NPDashboard\Payments\Gateways;

use NPCore\Payments\Gateways\AbstractGateway;
use NPCore\Payments\Gateways\Contracts\GatewayContract;
use NPDashboard\Models\Plan;
use NPDashboard\Models\Sale;
use NPDashboard\Models\Subscription;

class Pagseguro extends AbstractGateway implements GatewayContract
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
        return "indisponível";
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

    public function updateRecurringPlan(Plan $plan)
    {
        // TODO: Implement updateRecurringPlan() method.
    }
}