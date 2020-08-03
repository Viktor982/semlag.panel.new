<?php

namespace NPDashboard\Models;

use NPDashboard\Models\Model;
use NPDashboard\Models\Sale;
use NPDashboard\Models\Coupon;
use NPDashboard\Models\Subscription;
use NPDashboard\Models\WithdrawRequest;
use NPDashboard\Models\AffiliateInfo;
use NPDashboard\Models\ResellerSettings;

class Customer extends Model
{
    protected $table = 'usuario';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sales()
    {
        return $this->hasMany(Sale::class, 'usuario_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usedCoupons()
    {
        return $this->hasMany(Coupon::class, 'user_activated');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function resellerCoupons()
    {
        return $this->hasMany(Coupon::class, 'vendedor');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function testimonial()
    {
        return $this->hasOne(Testimonial::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function withdrawals()
    {
        return $this->hasMany(WithdrawRequest::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function affiliatedReference()
    {
        return $this->belongsTo(Customer::class, 'affiliated_reference_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function affiliateInfo()
    {
        return $this->hasOne(AffiliateInfo::class, 'affiliated_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function affiliateRate()
    {
        return $this->hasMany(AffiliateRateCommission::class,'affiliated_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function affiliateAccess()
    {
        return $this->hasMany(AffiliateAccesses::class, 'affiliated_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function affiliateSales()
    {
        return $this->hasMany(Sale::class, 'affiliated_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function resellerSettings()
    {
        return $this->hasOne(ResellerSetting::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function resellerPlans()
    {
        return $this->hasMany(ResellerPlan::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function commissions()
    {
        return $this->hasMany(AffiliateRateCommission::class, 'affiliated_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions()
    {
        return $this->hasMany(NPCoinTransaction::class, 'user_id', 'id');
    }

    /**
     * @param $rank
     * @param bool $recurring
     * @return int|null
     */
    public function commission($rank, $recurring = false)
    {
        $prefix = ($recurring) ? 'affiliate_rate_subscription_' : 'affiliate_rate_commission_';
        $commission = $this->commissions()
            ->where('key', $_rank = $prefix.$rank)
            ->get()
            ->first();
        return ($commission) ? $commission->value : npconfig($_rank);
    }

    /**
     * @return mixed
     */
    public function blockedBalance()
    {
        return $this->transactions()
            ->select('balance')
            ->where('operation','=',1)
            ->where('converted','=',false)
            ->where('created_at','>',(new \Carbon\Carbon())->subDays(30))
            ->get()
            ->pluck('balance')
            ->sum();
    }
}