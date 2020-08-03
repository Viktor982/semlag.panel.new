<?php

namespace NPDashboard\Models;

use NPDashboard\Models\Model;
use NPDashboard\Models\Plan;
use NPDashboard\Models\Gateway;

class PlanoGateway extends Model
{
    protected $table = 'plano_gateways';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function plan()
    {
        return $this->belongsTo(Plan::class, 'plano_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gateway()
    {
        return $this->belongsTo(Gateway::class);
    }
}
