<?php

namespace NPDashboard\Models;

use NPDashboard\Models\Model;
use NPDashboard\Models\Coupon;
use NPDashboard\Models\PlanValue;
use NPDashboard\Models\PlanCorrelationNpCoin;
use NPDashboard\Models\PlanoGateway;

class Plan extends Model
{
    protected $table = 'plano';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function coupons()
    {
        return $this->hasMany(Coupon::class, 'plano_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function planValues()
    {
        $plan = $this->hasMany(PlanValue::class, 'plano_id', 'id');
        return $plan->distinct();
    }

    /**
     * @param $currencyId
     * @return int
     */
    public function priceForCurrency($currencyId)
    {
        $value = $this->planValues
            ->where('currency_id', $currencyId)
            ->first();
        return ($value) ? $value->value : 0;
    }

    /**
     * @param $currencyId
     * @return string
     */
    public function recurringPriceForCurrency($currencyId)
    {
        $recurringDiscount = npconfig('discount_recurring') ?: 0;
        return number_format($this->priceForCurrency($currencyId) * ((100 - $recurringDiscount) / 100), 2);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function npCoins()
    {
        return $this->hasOne(PlanCorrelationNpCoin::class, 'plan_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function gatewayPlans()
    {
        return $this->hasMany(PlanoGateway::class, 'plano_id');
    }
}