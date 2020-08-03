<?php

namespace NPDashboard\Models\Bridge;

use NPDashboard\Models\Model;

class ServerRanking extends Model
{
    protected $connection = 'bd_alias';
    protected $table = 'server_ranking';
    protected $primaryKey = 'server_id';
    // public $timestamps = true;
}