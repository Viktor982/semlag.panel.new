<?php


namespace NPDashboard\Models;
use NPDashboard\Models\Model;


class ServerPools extends Model
{
    protected $connection = 'bd_alias';
    protected $table = 'server_pools';
    
    public function setTable($value){
        $table = $value;
    }
}