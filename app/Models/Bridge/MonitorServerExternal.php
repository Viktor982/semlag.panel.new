<?php

namespace NPDashboard\Models\Bridge;

use NPDashboard\Models\Model;

class MonitorServerExternal extends Model
{
    protected $connection = 'bd_alias';
    protected $table = 'monitor_server_external';
    public $timestamps = false;
}