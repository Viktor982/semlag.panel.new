<?php


namespace NPDashboard\Http\Controllers\API;


use NPDashboard\Http\Controllers\Controller;
use NPDashboard\Repositories\DiscountRepository;
use NPDashboard\Repositories\SalesRepository;

class DiscountCoupons extends Controller
{
    /**
     * @param DiscountRepository $repository
     * @param SalesRepository $salesRepository
     * @return array
     */
    public function getStats(DiscountRepository $repository, SalesRepository $salesRepository)
    {
        $stats = $repository->allDiscountsJoin();
        foreach($stats as $discount){
            $data[] = [
                'name' => $discount->name,
                'sales' => $discount->sales,
                'salesApproved' => $discount->salesApproved
            ];
        }
        return [
            'data' => $data
        ];
    }

}