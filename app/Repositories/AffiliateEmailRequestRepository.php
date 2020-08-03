<?php

namespace NPDashboard\Repositories;

use Illuminate\Database\Eloquent\Model;
use NPDashboard\Models\AffiliateEmailRequest;

class AffiliateEmailRequestRepository extends Repository
{
    /**
     * @return AffiliateEmailRequest
     */
    public function getModel()
    {
        return (new AffiliateEmailRequest());
    }

    /**
     * @return mixed
     */
    public function emailRequestsTable()
    {
        return $this->getModel()
            ->select('id', 'affiliate_id', 'customer_id', 'body', 'status', 'created_at', 'updated_at')
            ->paginate(10);
    }

    /**
     * @return mixed
     */
    public function emailRequestsPendingTable()
    {
        return $this->getModel()
            ->select('id', 'affiliate_id', 'customer_id', 'body', 'status', 'created_at', 'updated_at')
            ->where('status', 1)
            ->paginate(10);
    }

    /**
     * @return mixed
     */
    public function emailRequestsApprovedTable()
    {
        return $this->getModel()
            ->select('id', 'affiliate_id', 'customer_id', 'body', 'status', 'created_at', 'updated_at')
            ->where('status', 2)
            ->paginate(10);
    }

    /**
     * @return mixed
     */
    public function emailRequestsDisapprovedTable()
    {
        return $this->getModel()
            ->select('id', 'affiliate_id', 'customer_id', 'body', 'status', 'created_at', 'updated_at')
            ->where('status', 3)
            ->paginate(10);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findByAffiliateId($id)
    {
        return $this->getModel()
            ->select('id', 'affiliate_id', 'customer_id', 'body', 'status', 'created_at', 'updated_at')
            ->where('affiliate_id', $id)
            ->paginate(10);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findByCustomerId($id)
    {
        return $this->getModel()
            ->select('id', 'affiliate_id', 'customer_id', 'body', 'status', 'created_at', 'updated_at')
            ->where('customer_id', $id)
            ->paginate(10);
    }

    /**
     * @param $method
     * @param $value
     * @return mixed
     */
    public function searchEmailRequest($method, $value)
    {
        if (empty($method) || empty($value)) {
            return $this->emailRequestsTable();
        }

        switch ($method) {

            case 'email-affiliate':
                $affiliate = (new CustomersRepository())->findByEmail($value);
                return $this->findByAffiliateId($affiliate->id);
                break;

            case 'email-customer':
                $customer = (new CustomersRepository())->findByEmail($value);
                return $this->findByCustomerId($customer->id);
                break;
        }
    }
}