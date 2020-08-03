<?php


namespace NPDashboard\Repositories;

use NPDashboard\Models\WithdrawRequest;
use Illuminate\Database\Eloquent\Model;
use NPDashboard\Repositories\Repository;

class WithdrawRequestsRepository extends Repository
{
    /**
     * @return WithdrawRequest
     */

    public function getModel()
    {
        return (new WithdrawRequest());
    }

    /**
     * @param $status
     * @return mixed
     */

    public function findByStatus($status)
    {
        return $this->getModel()
            ->where('status_code', $status)
            ->get();
    }

    /**
     * @return mixed
     */
    public function withdrawalsTable()
    {
        return $this->getModel()
            ->select('id', 'status_code', 'user_id', 'type', 'value', 'created_at', 'updated_at')
            ->paginate(10);
    }

    /**
     * @return mixed
     */
    public function pendingWithdrawalsTable()
    {
        return $this->getModel()
            ->select('id', 'status_code', 'user_id', 'type', 'value', 'created_at', 'updated_at')
            ->where('status_code', 1)
            ->paginate(10);
    }

    /**
     * @return mixed
     */
    public function takenCompletedTable()
    {
        return $this->getModel()
            ->select('id', 'status_code', 'user_id', 'type', 'value', 'created_at', 'updated_at')
            ->where('status_code', 2)
            ->paginate(10);
    }
}