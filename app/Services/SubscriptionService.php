<?php

namespace NPDashboard\Services;

use NPDashboard\Models\Subscription;
use NPDashboard\Services\Contracts\SubscriptionServiceContract;

class SubscriptionService implements SubscriptionServiceContract
{
    public function __construct()
    {
    }

    public function updateStatus(Subscription $subscription, $status)
    {
        // TODO: Implement updateStatus() method.
    }

    public function getStatusChangeHistory(Subscription $subscription)
    {
        // TODO: Implement getStatusChangeHistory() method.
    }
}
