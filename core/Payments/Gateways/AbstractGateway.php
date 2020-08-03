<?php


namespace NPCore\Payments\Gateways;


use NPDashboard\Models\Plan;

abstract class AbstractGateway
{
    protected $gateway_id = 999;
    protected $currency = 1;

    protected function setGatewayPlanId(Plan $plan, $id)
    {
        $plan->gatewayPlans()->updateOrCreate(['gateway_id' => $this->gateway_id], [
            'final_id' => $id
        ]);
    }
}