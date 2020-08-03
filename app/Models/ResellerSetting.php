<?php

namespace NPDashboard\Models;

use NPDashboard\Models\Model;

class ResellerSetting extends Model
{
    protected $table = "reseller_settings";

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'user_id');
    }
}