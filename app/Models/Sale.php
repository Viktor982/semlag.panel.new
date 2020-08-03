<?php

namespace NPDashboard\Models;

use NPDashboard\Models\Model;
use NPDashboard\Models\Customer;
use NPDashboard\Models\Coupon;
use NPDashboard\Models\Plan;
use NPDashboard\Models\Subscription;
use NPDashboard\Models\SaleQuote;

class Sale extends Model
{
    protected $table = 'venda';
    
    /**
     * @var int
     */
    const STATUS_APPROVED = 2;

    /**
     * @var int
     */
    const STATUS_CANCELED = 3;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'usuario_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function coupons()
    {
        return $this->hasMany(Coupon::class, 'venda_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function plan()
    {
        return $this->belongsTo(Plan::class, 'plano_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subscription()
    {
        return $this->belongsTo(Subscription::class,'assinatura_id');
    }

    public function affiliateInfo()
    {
        return $this->belongsTo(Customer::class, 'affiliated_id');
    }

    public function affiliateAccess()
    {
        return $this->hasMany(AffiliateAccesses::class, 'affiliated_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function quotes()
    {
        return $this->hasMany(SaleQuote::class, 'sale_id', 'id');
    }

    /**
     * @return int
     */
    public function getRecurringIndexAttribute()
    {
        $sub = $this->subscription;
        if($sub) {
            $sales = $this->subscription
                ->sales()
                ->select('id')
                ->get()
                ->pluck('id')
                ->toArray();
            $index = array_search($this->id, $sales);
            return ($index === false) ? 0 : $index+1;
        }
        return 0;
    }
}