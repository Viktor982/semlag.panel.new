<?php

namespace NPDashboard\Models\Bridge;

use NPDashboard\Models\Model;

class FinalIpRelations extends Model
{
    protected $connection = 'bd_alias';
    protected $table = 'server_x_ips';
    public $timestamps = false;
}