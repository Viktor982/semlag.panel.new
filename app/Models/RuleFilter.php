<?php

namespace NPDashboard\Models;

use NPDashboard\Models\Model;

class RuleFilter extends Model
{
    protected $connection = 'bd_alias';
    protected $table = 'rules_filters';
}