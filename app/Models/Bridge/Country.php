<?php

namespace NPDashboard\Models\Bridge;

use NPDashboard\Models\Model;

class Country extends Model
{
    protected $connection = 'bd_alias';
    protected $table = 'countrys';
    public $timestamps = false;
}