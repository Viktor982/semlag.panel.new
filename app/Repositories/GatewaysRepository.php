<?php

namespace NPDashboard\Repositories;

use Illuminate\Database\Eloquent\Model;
use NPDashboard\Repositories\Repository;
use NPDashboard\Models\Gateway;

class GatewaysRepository extends Repository
{
    /**
     * @return Gateway
     */
    public function getModel()
    {
        return (new Gateway());
    }

    /**
     * @return mixed
     */
    public function gatewaysTable()
    {
        return $this->getModel()
            ->select('id', 'active', 'subscription', 'name', 'fee')
            ->paginate(10);
    }

    /**
     * @return mixed
     */
    public function listGateways()
    {
        return $this->getModel()
            ->select('id', 'db_id', 'name', 'active')
            ->get();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findByMethodId($id)
    {
        return $this->getModel()
            ->where('db_id', $id)
            ->get()
            ->first();
    }
}