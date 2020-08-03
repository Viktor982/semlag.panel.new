<?php


namespace NPCore\Payments\Gateways\Contracts;

use NPDashboard\Models\Subscription;
use NPDashboard\Models\Sale;
use NPDashboard\Models\Plan;

interface GatewayContract
{
    public function getPurchaseStatusChangeHistory(Sale $sale);
    public function getSubscriptionStatusChangeHistory(Subscription $subscription);
    public function getSubscriptionsSalesWithStatus(Subscription $subscription);
    public function getBalance();
    public function getBlockedBalance();
    public function getSalesByPeriod($date, $period);
    public function getSalesCountByPeriod($date, $period);
    public function getIpnHistory($date, $period);
    public function updateRecurringPlan(Plan $plan);
}