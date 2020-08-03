<?php

namespace NPDashboard\Models;

use NPDashboard\Models\Model;

class FakeAlias extends Model
{
    protected $connection = 'bd_alias';
    protected $table = 'fake_alias_info';
    public $timestamps = false;
}