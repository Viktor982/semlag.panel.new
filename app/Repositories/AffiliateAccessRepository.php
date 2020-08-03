<?php


namespace NPDashboard\Repositories;


use Illuminate\Database\Eloquent\Model;
use NPDashboard\Models\AffiliateAccesses;

class AffiliateAccessRepository extends Repository
{
    /**
     * @return AffiliateAccesses
     */
    public function getModel()
    {
        return (new AffiliateAccesses());
    }

    /**
     * @param $toDate
     * @param $fromDate
     * @return mixed
     */
    public function getAccess($toDate, $fromDate)
    {
        return $this->getModel()
            ->select('affiliated_id', 'date')
            ->whereBetween('date', [$toDate, $fromDate])
            ->get();
    }
}