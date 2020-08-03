<?php

namespace NPDashboard\Models;

use NPDashboard\Models\Model;

class ClientGameInfoLogger extends Model
{
    protected $table = 'client_game_info';
    protected $connection = 'proxy_logger2';
    public $timestamps = true;
}