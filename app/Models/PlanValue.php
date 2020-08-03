<?php

namespace NPDashboard\Models;

use NPDashboard\Models\Model;

class PlanValue extends Model
{
    protected $table = 'plano_value';

    /**
     * @return NPDashboard\Models\Currency
     */
    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id', 'id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }
}