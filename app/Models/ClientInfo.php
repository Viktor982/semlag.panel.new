<?php

namespace NPDashboard\Models;

use NPDashboard\Models\Model;

class ClientInfo extends Model
{
    protected $connection = 'bd_alias';
    protected $table = 'client_info';
}