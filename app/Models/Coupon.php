<?php

namespace NPDashboard\Models;

use NPDashboard\Models\Model;
use NPDashboard\Models\Customer;
use NPDashboard\Models\Sale;
use NPDashboard\Models\Plan;

class Coupon extends Model
{
    protected $table = 'cupom';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customerActivated()
    {
        return $this->belongsTo(Customer::class, 'user_activated');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reseller()
    {
        return $this->belongsTo(Customer::class, 'vendedor');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sale()
    {
        return $this->belongsTo(Sale::class, 'venda_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function plan()
    {
        return $this->belongsTo(Plan::class, 'plano_id');
    }

}