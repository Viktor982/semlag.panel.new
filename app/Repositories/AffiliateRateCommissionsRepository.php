<?php

namespace NPDashboard\Repositories;

use Illuminate\Database\Eloquent\Model;
use NPDashboard\Models\AffiliateRateCommission;

class AffiliateRateCommissionsRepository extends Repository
{
    /**
     * @return AffiliateRateCommission
     */
    public function getModel()
    {
        return (new AffiliateRateCommission());
    }


    /**
     * @param $id
     * @return mixed
     */
    public function findByAffiliateCode($id)
    {
        return $this->getModel()
            ->where('affiliated_id', $id)
            ->get();
    }
}