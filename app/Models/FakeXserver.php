<?php

namespace NPDashboard\Models;

use NPDashboard\Models\Model;

class FakeXserver extends Model
{
    protected $connection = 'bd_alias';
    protected $table = 'server_x_fake_alias';
    public $timestamps = false;
}