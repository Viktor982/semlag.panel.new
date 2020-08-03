<?php

namespace NPDashboard\Models\Bridge;

use NPDashboard\Models\Model;

class BridgeToken extends Model
{
    protected $connection = 'bd_alias';
    protected $table = 'tokens';
    public $timestamps = false;
}