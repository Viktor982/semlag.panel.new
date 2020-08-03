<?php

namespace NPDashboard\Repositories;

use Illuminate\Database\Eloquent\Model;
use NPDashboard\Repositories\Repository;
use NPDashboard\Models\Currency;

class CurrencyRepository extends Repository
{
    /**
     * @return Currency
     */
    public function getModel()
    {
        return (new Currency());
    }

    /**
     * @param $code
     * @return mixed
     */
    public function findByCode($code)
    {
        return $this->getModel()
            ->where('code', $code)
            ->first();
    }
}