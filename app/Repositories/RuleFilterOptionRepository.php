<?php

namespace NPDashboard\Repositories;

use NPDashboard\Models\RuleFilterOption;

class RuleFilterOptionRepository extends Repository
{
    /**
     * @return \Illuminate\Database\Eloquent\Model|RuleFilterOption
     */
    public function getModel()
    {
        return (new RuleFilterOption());
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model[]|RuleFilterOption[]
     */
    public function getFilters()
    {
        return $this->getModel()->all();
    }

    public function insertOptionToFilter($key, $value, $filter)
    {
        return $this->getModel()->create([
           'key' => $key,
           'value' => $value,
           'identifier_filter' => $filter
        ]);
    }

}