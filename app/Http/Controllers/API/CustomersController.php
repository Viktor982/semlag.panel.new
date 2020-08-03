<?php

namespace NPDashboard\Http\Controllers\API;

use NPDashboard\Http\Controllers\Controller;
use NPDashboard\Repositories\CustomersRepository;

class CustomersController extends Controller
{
    /**
     * @param CustomersRepository $repository
     * @return array
     */
    public function getDays(CustomersRepository $repository)
    {
        $id = $this->request->only(['id']);
        $customer = $repository->find($id);
        $days = [
            'vip_remaining' => (\Carbon\Carbon::parse($customer->vip_time))->diffInDays(),
            'vip_premium_remaining' => (\Carbon\Carbon::parse($customer->vip_time_premium))->diffInDays()
        ];

        return $days;
    }

}