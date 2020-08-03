<?php

namespace NPDashboard\Repositories;

use NPDashboard\Models\RuleFilterPath;

class RuleFilterPathRepository extends Repository
{
    /**
     * @return \Illuminate\Database\Eloquent\Model|RuleFilterPath
     */
    public function getModel()
    {
        return (new RuleFilterPath());
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model[]|RuleFilterPath[]
     */
    public function getFilters()
    {
        return $this->getModel()->all();
    }

    public function insertPathToFilter($path, $filter)
    {
        return $this->getModel()->create([
            'path' => $path,
            'identifier_filter' => $filter
        ]);
    }

}