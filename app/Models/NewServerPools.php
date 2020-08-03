<?php


namespace NPDashboard\Models;
use NPDashboard\Models\Model;


class NewServerPools extends Model
{
    protected $connection = 'bd_alias';
    protected $table = 'server_pools_ips';
    protected $timestamp = false;
    
    public function setTable($table_alt, $timestamp_alt){
        $table = $table_alt;
        $timestamp = $timestamp_alt;
    }
}