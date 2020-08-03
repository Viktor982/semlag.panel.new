<?php

namespace NPDashboard\Models\Bridge;

use NPDashboard\Models\Model;

class LauncherBridgeInfo extends Model
{
    protected $connection = 'bd_alias';
    protected $table = 'server_x_bridge_info';
    public $timestamps = false;
}