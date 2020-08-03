<?php

namespace NPDashboard\Repositories;

use Illuminate\Database\Eloquent\Model;
use NPDashboard\Models\NPCoinValuation;
use NPDashboard\Repositories\Repository;
use NPDashboard\Models\Currency;

class NPCoinValuationRepository extends Repository
{
    /**
     * @return NPCoinValuation
     */
    public function getModel()
    {
        return (new NPCoinValuation());
    }

    /**
     * @param $code
     * @return mixed
     */
    public function findByCode($code)
    {
        $currency = (new CurrencyRepository())->findByCode($code);
        return $this->getModel()
            ->where('currency_id', $currency->id)
            ->first();
    }
}