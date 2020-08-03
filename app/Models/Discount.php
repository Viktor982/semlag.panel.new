<?php


namespace NPDashboard\Models;

use NPDashboard\Models\Model;
use NPDashboard\Models\Plan;

class Discount extends Model
{
    protected $table = 'cupom_desconto';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function plan()
    {
        return $this->hasMany(Plan::class, 'plano_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sales()
    {
        return $this->hasMany(Sale::class,'discount_id','id');
    }
}