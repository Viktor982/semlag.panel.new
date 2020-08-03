<?php

namespace NPDashboard\Models;

use NPDashboard\Models\Model;
use NPDashboard\Models\Sale;
use NPDashboard\Models\Coupon;
use NPDashboard\Models\Subscription;

class WithdrawRequest extends model
{
    protected $table = 'withdraw_requests';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fields()
    {
        return $this->hasMany(WithdrawRequestField::class, 'request');
    }
}