<?php

namespace NPDashboard\Services;

use Carbon\Carbon;
use NPDashboard\Models\Customer;
use NPDashboard\Models\Plan;

class VipService
{
    /**
     * @param Customer $customer
     * @param $days
     */
    public function removePremiumDays(Customer $customer, $days)
    {
        $newExpireDate = new Carbon($customer->vip_time_premium);
        $customer->vip_time_premium = $newExpireDate->subDays($days);
        $customer->save();
    }

    /**
     * @param Customer $customer
     * @param $days
     */
    public function removeVipDays(Customer $customer, $days)
    {
        $newExpireDate = new Carbon($customer->vip_time);
        $customer->vip_time = $newExpireDate->subDays($days);
        $customer->save();
    }

    /**
     * @param Customer $customer
     * @param Plan $plan
     */
    public function removePlanDays(Customer $customer, Plan $plan)
    {
        if ($plan->special){
            $this->removePremiumDays($customer, $plan->frequency);
        }else{
            $this->removeVipDays($customer, $plan->frequency);
        }
    }

    /**
     * @param Customer $customer
     * @param Plan $plan
     */
    public function addPlanDays(Customer $customer, Plan $plan)
    {
        if ($plan->special){
            $this->addPremiumDays($customer, $plan->frequency);
        }else{
            $this->addVipDays($customer, $plan->frequency);
        }
    }

    /**
     * @param Customer $customer
     * @param $days
     */
    public function addPremiumDays(Customer $customer, $days)
    {
        $newExpireDate = new Carbon($customer->vip_time_premium);
        $customer->vip_time_premium = $newExpireDate->addDays($days);

        $customer->save();
    }

    /**
     * @param Customer $customer
     * @param $days
     */
    public function addVipDays(Customer $customer, $days)
    {
        $newExpireDate = new Carbon($customer->vip_time);
        $customer->vip_time = $newExpireDate->addDays($days);

        $customer->save();
    }
}