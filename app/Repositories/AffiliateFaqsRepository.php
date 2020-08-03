<?php

namespace NPDashboard\Repositories;

use Illuminate\Database\Eloquent\Model;
use NPDashboard\Models\NPFaqAffiliate;

class AffiliateFaqsRepository extends Repository
{
    /**
     * @return NPFaqAffiliate
     */
    public function getModel()
    {
        return (new NPFaqAffiliate());
    }

    /**
     * @return mixed
     */
    public function affiliateFaqsTable($lang)
    {
        return $this->getModel()
            ->select('id','lang','question','answer', 'order')
            ->where('lang', $lang)
            ->paginate(10);
    }
}