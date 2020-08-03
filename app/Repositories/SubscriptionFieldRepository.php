<?php

namespace NPDashboard\Repositories;

use NPDashboard\Models\SubscriptionField;
use NPDashboard\Repositories\Repository;

class SubscriptionFieldRepository extends Repository
{
    /**
     * @return SubscriptionField
     */

    public function getModel()
    {
        return (new SubscriptionField());
    }

    public function save(array $args)
    {
        return $this->getModel()->create($args);
    }
}