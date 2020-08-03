<?php

namespace NPDashboard\ViewHelpers;

use NPDashboard\Repositories\SubscriptionsRepository;

class SubscriptionsViewHelper
{
    /**
     * @var SubscriptionsRepository
     */
    private $repository;

    public function __construct()
    {
        $this->repository = new SubscriptionsRepository();
    }

    /**
     * @param bool $approved
     * @return mixed
     */
    public function today($approved = false)
    {
        $status = ($approved) ? 2 : 1;
        $today = date("Y-m-d");
        return $this->repository
            ->getModel()
            ->select('id', 'status_code')
            ->where('created_at', '>=', "{$today} 00:00:00")
            ->where('created_at', '<=', "{$today} 23:59:59")
            ->where('status_code', $status)
            ->count();
    }
}