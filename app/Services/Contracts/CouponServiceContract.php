<?php

namespace NPDashboard\Services\Contracts;

use NPDashboard\Models\Coupon;
use NPDashboard\Models\Customer;
use NPDashboard\Models\Plan;

interface CouponServiceContract
{
    /**
     * @param Plan $plan
     * @param $amount
     * @return mixed
     */
    public function generateCoupon(Plan $plan, $amount);

    /**
     * @param Coupon $coupon
     * @param $status
     * @return mixed
     */
    public function updateStatus(Coupon $coupon, $status);

    /**
     * @param Coupon $coupon
     * @param Customer $customer
     * @return mixed
     */
    public function applyForCustomer(Coupon $coupon, Customer $customer);

    /**
     * @param Coupon $coupon
     * @return mixed
     */
    public function removeCouponDays(Coupon $coupon);
}