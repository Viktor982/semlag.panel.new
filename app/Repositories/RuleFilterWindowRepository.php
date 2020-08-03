<?php

namespace NPDashboard\Repositories;

use NPDashboard\Models\RuleFilterWindow;

class RuleFilterWindowRepository extends Repository
{
    /**
     * @return \Illuminate\Database\Eloquent\Model|RuleFilterWindow
     */
    public function getModel()
    {
        return (new RuleFilterWindow());
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model[]|RuleFilterWindow[]
     */
    public function getFilters()
    {
        return $this->getModel()->all();
    }

    public function insertWindowToFilter($window, $filter)
    {
        return $this->getModel()->create([
            'window' => $window,
            'identifier_filter' => $filter
        ]);
    }

}