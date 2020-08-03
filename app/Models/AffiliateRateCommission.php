<?php

namespace NPDashboard\Models;

class AffiliateRateCommission extends Model
{
    protected $table = "affiliate_rate_commission";

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(User::class, 'affiliated_id');
    }

}