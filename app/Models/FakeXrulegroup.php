<?php

namespace NPDashboard\Models;

use NPDashboard\Models\Model;

class FakeXrulegroup extends Model
{
    protected $connection = 'bd_alias';
    protected $table = 'rules_rulegroup_x_fake_alias';
    public $timestamps = false;
}