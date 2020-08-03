<?php

namespace NPDashboard\Repositories;

use Illuminate\Database\Eloquent\Model;
use NPDashboard\Models\NPConfig;

class NPConfigRepository extends Repository
{
    /**
     * @return NPConfig
     */
    public function getModel()
    {
        return (new NPConfig());
    }

    /**
     * @param $value
     * @return mixed
     */
    public function findByKey($value)
    {
        return $this->getModel()
            ->where('key', $value)
            ->get()
            ->first();
    }

    /**
     * @return mixed
     */
    public function defaultAffiliateCommission()
    {
        return $this->getModel()
            ->select('key', 'value')
            ->where('key','like','affiliate_rate_commission%')
            ->get();
    }

    public function defaultAffiliateSubscription()
    {
        return $this->getModel()
            ->select('key', 'value')
            ->where('key','like','affiliate_rate_subscription%')
            ->get();
    }

}