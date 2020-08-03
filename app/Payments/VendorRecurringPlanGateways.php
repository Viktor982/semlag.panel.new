<?php

namespace NPDashboard\Payments;

use NPDashboard\Models\Plan;
use NPDashboard\Payments\Gateways\Paypal;

class VendorRecurringPlanGateways
{
    /**
     * @return array
     */
    public static function gatewaysList()
    {
        $list = [
            \NPDashboard\Payments\Gateways\Mercadopago::class,
            \NPDashboard\Payments\Gateways\Stripe::class,
            \NPDashboard\Payments\Gateways\Pagarme::class,
        ];
        return $list;
    }

    /**
     * @param Plan $plan
     */
    public static function updateAll(Plan $plan)
    {
        $list = self::gatewaysList();
        foreach ($list as $gateway) {
            $instance = new $gateway;
            $instance->updateRecurringPlan($plan);
        }
    }
}