<?php

namespace NPDashboard\Services;

use NPDashboard\Models\Discount;
use NPDashboard\Repositories\DiscountRepository;
use NPDashboard\Services\Contracts\DiscountServiceContract;

class DiscountService implements DiscountServiceContract
{
    public function updateAffectedPlans(Discount $discount)
    {
        // TODO: Implement updateAffectedPlans() method.
    }

    public function updatePercentage(Discount $discount)
    {
        // TODO: Implement updatePercentage() method.
    }

    /**
     * @param $args
     * @return mixed
     */
    public function create($args)
    {
        $plans = implode(',', $args['plans_affected']);
        $date = (new \Carbon\Carbon($args['expire_date']))->format("Y-m-d H:i:s");
        $repository = (new DiscountRepository());
        $discount = $repository->create([
                'name' => $args['name'],
                'plans_affected' => $plans,
                'percentage' => $args['percentage'],
                'expire_date' => $date,
                'code' => $args['code']
            ]
        );

        return $discount;
    }
}