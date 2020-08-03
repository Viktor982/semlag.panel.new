<?php

namespace NPDashboard\Models\RouteDatabase;

use NPDashboard\Models\Model;

class BridgeStatus extends Model
{
    protected $connection = 'bd_route_database';
    protected $table = 'bridge_status';
}