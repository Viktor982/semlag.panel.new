<?php

namespace NPDashboard\Repositories;

use Illuminate\Database\Eloquent\Model;
use NPDashboard\Models\AffiliateDefaultRanking;

class AffiliateDefaultRankingsRepository extends Repository
{
    /**
     * @return AffiliateDefaultRanking
     */
    public function getModel()
    {
        return (new AffiliateDefaultRanking());
    }

    /**
     * @param $rank
     * @param $key
     * @return mixed
     */
    public function findByArgs($rank, $key)
    {
        return $this->getModel()
            ->where('rank', $rank)
            ->where('key', $key)
            ->first();
    }

    /**
     * @param $rank
     * @return mixed
     */
    public function findByRank($rank)
    {
        return $this->getModel()
            ->where('rank', $rank)
            ->get();
    }
}