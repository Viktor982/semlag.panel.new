<?php

namespace NPDashboard\Models;

use NPDashboard\Models\Model;

class CustomerCurrency extends Model
{
    protected $table = 'user_x_currency';
    protected $fillable = ['user_id', 'currency_id'];
    protected $primaryKey = 'user_id';
    public $timestamps = false;
    public $incrementing = false;
}