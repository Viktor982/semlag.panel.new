<?php

namespace NPDashboard\Models;

use NPDashboard\Models\Model;

class GenericLog extends Model
{
    protected $connection = 'proxy_logger';
    protected $table = 'generic_log';
    public $timestamps = false;
}