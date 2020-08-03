<?php

namespace NPDashboard\Repositories;

use NPDashboard\Models\Subscription;
use Illuminate\Database\Eloquent\Model;
use NPDashboard\Repositories\Repository;

class SubscriptionsRepository extends Repository
{
    /**
     * @return Subscription
     */

    public function getModel()
    {
        return (new Subscription());
    }

    public function save(array $args)
    {
        return $this->getModel()->create($args);
    }

    /**
     * @param $method
     * @return mixed
     */

    public function findByPaymentMethod($method)
    {
        return $this->getModel()
            ->where('gateway_id', $method)
            ->get();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        return $this->getModel()
            ->where('id', $id)
            ->get();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findByCustomer($id)
    {
        return $this->getModel()
            ->where('user_id', $id)
            ->get();
    }

    public function findLastByCustomer($id)
    {
        return $this->getModel()
            ->where('user_id', $id)
            ->orderBy('created_at', 'DESC')
            ->first();
    }

    /**
     * @return mixed
     */
    public function subscriptionsTable()
    {
        return $this->getModel()
            ->select('id', 'user_id', 'plan_id', 'status_code', 'gateway_id', 'created_at')
            ->paginate(10);
    }

    /**
     * @param $status
     * @return mixed
     */
    public function findByStatus($status)
    {
        return $this->getModel()
            ->where('status_code', $status)
            ->paginate(10);
    }

    /**
     * @param $method
     * @param $value
     * @return mixed
     */
    public function search($method, $value)
    {
        if (empty($method) || empty($value)) {
            return $this->subscriptionsTable();
        }

        switch ($method) {
            case 'id':
                return $this->findById($value);
                break;

            case 'email':
                $customer = (new CustomersRepository())->findByEmail($value);
                return $this->findByCustomer($customer->id);
                break;

            default:
                return $this->subscriptionsTable();
                break;
        }
    }
}