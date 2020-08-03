<?php

namespace NPDashboard\Models\Bridge;

use NPDashboard\Models\Model;

class BridgeTask extends Model
{
    protected $connection = 'bd_alias';
    protected $table = 'tasks';
    public $timestamps = false;
}