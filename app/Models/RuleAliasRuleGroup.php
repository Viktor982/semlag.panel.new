<?php

namespace NPDashboard\Models;

use NPDashboard\Models\Model;

class RuleAliasRuleGroup extends Model
{
    protected $connection = 'bd_alias';
    protected $table = 'rules_rulegroup_x_servers';
}