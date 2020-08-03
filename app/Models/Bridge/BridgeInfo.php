<?php

namespace NPDashboard\Models\Bridge;

use NPDashboard\Models\Model;

class BridgeInfo extends Model
{
    protected $connection = 'bd_alias';
    protected $table = 'servers';
    public $timestamps = false;
}