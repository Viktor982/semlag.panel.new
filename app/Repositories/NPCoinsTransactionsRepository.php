<?php


namespace NPDashboard\Repositories;

use Illuminate\Database\Eloquent\Model;
use NPDashboard\Models\NPCoinTransaction;

class NPCoinsTransactionsRepository extends Repository
{
    /**
     * @return NPCoinTransaction
     */
    public function getModel()
    {
        return (new NPCoinTransaction());
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getTransactions($id)
    {
        return $this->getModel()
            ->where('user_id', $id)
            ->get();
    }
}