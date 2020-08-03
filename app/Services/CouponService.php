<?php

namespace NPDashboard\Services;

use NPDashboard\Models\Coupon;
use NPDashboard\Models\Customer;
use NPDashboard\Models\Plan;
use NPDashboard\Repositories\CouponsRepository;
use NPDashboard\Services\Contracts\CouponServiceContract;

class CouponService implements CouponServiceContract
{
    /**
     * @param Plan $plan
     * @param $amount
     * @param null $id
     * @return array
     */
    public function generateCoupon(Plan $plan, $amount, $id = null)
    {
        $generatedCoupons = [];

        for ($i = 0; $i < $amount; $i++) {
            $generatedCoupons[] = (new CouponsRepository())->create(['plan' =>$plan->id, 'id' => $id]);
        }

        return $generatedCoupons;
    }

    /**
     * @param Coupon $coupon
     * @param $status
     */
    public function updateStatus(Coupon $coupon, $status)
    {
        $coupon->disabled = $status;
        $coupon->save();
    }

    /**
     * @param Coupon $coupon
     * @param Customer $customer
     */
    public function applyForCustomer(Coupon $coupon, Customer $customer)
    {
        $coupon->customerActivated()->associate($customer);
        $coupon->save();

        (new VipService())->addPlanDays($customer, $coupon->plan);
    }

    /**
     * @param Coupon $coupon
     */
    public function removeCouponDays(Coupon $coupon)
    {
        (new VipService())->removePlanDays($coupon->customerActivated, $coupon->plan);
    }
}