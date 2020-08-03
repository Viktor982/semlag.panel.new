<?php

namespace NPDashboard\Models;

use NPDashboard\Models\Model;

class RuleFilterRemotePort extends Model
{
    protected $connection = 'bd_alias';
    protected $table = 'rules_filters_remote_port';
}