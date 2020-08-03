<?php

namespace NPDashboard\Models\Bridge;

use NPDashboard\Models\Model;

class BridgeLog extends Model
{
    protected $connection = 'proxy_logger';
    protected $table = 'servicepanel_delete_log';
    public $timestamps = false;
}