<?php

namespace NPDashboard\Models;

use NPDashboard\Models\Model;
use NPDashboard\Models\Subscription;

class SubscriptionField extends Model
{
    public $timestamps = true;
    protected $table = 'subscription_fields';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subscription()
    {
        return $this->belongsTo(Subscription::class, 'subscription_id');
    }
}