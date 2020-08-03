<?php

namespace NPDashboard\ViewHelpers;

use NPDashboard\Repositories\CustomersRepository;

class CustomersViewHelper
{
    /**
     * @return mixed
     */
    public function todayRegistrationsCount()
    {
        $today = date("Y-m-d");
        return (new CustomersRepository())->getModel()
            ->select('id', 'date_created')
            ->where('date_created', '>=', "{$today} 00:00:00")
            ->where('date_created', '<=', "{$today} 23:59:59")
            ->count();
    }
}