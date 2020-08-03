<?php

namespace NPDashboard\Services\Contracts;

use NPDashboard\Models\Discount;

interface DiscountServiceContract
{
    /**
     * @param Discount $discount
     * @return mixed
     */
    public function updateAffectedPlans(Discount $discount);

    /**
     * @param Discount $discount
     * @return mixed
     */
    public function updatePercentage(Discount $discount);

    /**
     * @param $args
     * @return mixed
     */
    public function create($args);
}