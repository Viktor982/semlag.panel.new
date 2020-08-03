<?php

namespace NPDashboard\Models;

use NPDashboard\Models\Model;

class UiStats extends Model
{
    protected $connection = 'proxy_logger';
    protected $table = 'event_log';
}