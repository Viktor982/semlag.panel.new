<?php

namespace NPDashboard\Repositories;

use Illuminate\Database\Eloquent\Model;
use NPDashboard\Repositories\Repository;
use NPDashboard\Models\CustomerCurrency;

class CustomerCurrencyRepository extends Repository
{
    /**
     * @return Currency
     */
    public function getModel()
    {
        return (new CustomerCurrency());
    }
    
    public function setCurrency($params)
    {
        return $this->getModel()
                    ->updateOrCreate([ 'user_id' => $params['user_id'] ], [ 'currency_id' => $params['currency_id'] ]);
    }

    public function getCurrency($id, $lang = null)
    {
        return $this->getModel()
                    ->firstOrCreate(['user_id' => $id], ['user_id' => $id,'currency_id' => $lang == 'br' ? 1 : 2]);
    }
}