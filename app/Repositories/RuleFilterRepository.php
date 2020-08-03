<?php

namespace NPDashboard\Repositories;

use NPCore\AppCapsule;
use NPDashboard\Models\RuleFilter;

class RuleFilterRepository extends Repository
{
    /**
     * @return \Illuminate\Database\Eloquent\Model|RuleFilter
     */
    public function getModel()
    {
        return (new RuleFilter());
    }

    public function getFilters()
    {
        return $this->getModel()->all();
    }

    public function insertNewFilter($identifier, $bin, $redirect, $custom='')
    {
        return $this->getModel()->create([
            'identifier' => $identifier,
            'custom' => $custom,
            'bin_name' => $bin,
            'redirect_name' => $redirect
        ]);
    }

    public function getFiltersOnView()
    {
        $db_raw = AppCapsule::database()->connection('bd_alias');
        $qry = "SELECT * FROM `rules_filters_params`";
        return $db_raw->select($qry);
    }

}