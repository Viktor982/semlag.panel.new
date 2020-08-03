<?php

namespace NPDashboard\Services\Contracts;

use NPDashboard\Models\Subscription;

interface SubscriptionServiceContract
{
    /**
     * @param Subscription $subscription
     * @param $status
     * @return mixed
     */
    public function updateStatus(Subscription $subscription, $status);

    /**
     * @param Subscription $subscription
     * @return mixed
     */
    public function getStatusChangeHistory(Subscription $subscription);
}