<?php

namespace NPDashboard\Models;

use NPDashboard\Models\Model;
use NPDashboard\Models\Sale;
use NPDashboard\Models\Customer;
use NPDashboard\Models\SubscriptionQuote;

class Subscription extends Model
{

    public $timestamps = true;
    protected $table = 'subscriptions';

    /**
     * @var int
     */
    const STATUS_APPROVED = 2;

    /**
     * @var int
     */
    const STATUS_CANCELED = 3;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sales()
    {
        return $this->hasMany(Sale::class, 'assinatura_id');
    }

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
    public function quotes()
    {
        return $this->hasMany(SubscriptionQuote::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fields()
    {
        return $this->hasMany(SubscriptionField::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cancelRequests()
    {
        return $this->hasMany(SubscriptionCancelRequest::class);
    }
}
