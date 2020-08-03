<?php

namespace NPDashboard\Models;

use NPDashboard\Models\Model;
use NPDashboard\Models\Sale;
use NPDashboard\Models\Coupon;
use NPDashboard\Models\Subscription;

class WithdrawRequestField extends model
{
    protected $table = 'withdraw_request_fields';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function withdrawRequest()
    {
        return $this->belongsTo(WithdrawRequest::class, 'request');
    }
}