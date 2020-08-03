<?php

namespace NPDashboard\Repositories\Bridge;

use NPCore\AppCapsule;
use Illuminate\Database\Eloquent\Model;
use NPDashboard\Repositories\Repository;
use NPDashboard\Models\Bridge\BridgeLog;

class ProxyLoggerRepository extends Repository
{
    public function getModel()
    {
        return (new BridgeLog());
    }

    public function storeLog($params){
        $usr = $params['user'];
        $msg = $params['message'];
        $date = $params['date'];
        $related = $params['server_id'];
        $action  = $params['action'];

        $db_raw = AppCapsule::database()->connection('proxy_logger');
        $query = "INSERT INTO servicepanel_bridge_log
                  (user, message, date, server_id, action) VALUES ('$usr', '$msg', '$date', $related, '$action')";
        try {
            $stored = $db_raw->select($query);
            return $stored;
        } catch (\Throwable $th) {
            return 'Não foi possível se conectar com o banco, o servidor recusou ativamente!';
        }
    }

    public function getDeletionLog(){
        $db_raw = AppCapsule::database()->connection('proxy_logger');
        $query = "SELECT * FROM servicepanel_bridge_log WHERE action = 'DELETE'";
        
        try {
            $stored = $db_raw->select($query);
            return $stored;
        } catch (\Throwable $th) {
            return 'Não foi possível se conectar com o banco, o servidor recusou ativamente!';
        }
    }

    public function getInsertLog(){
        $db_raw = AppCapsule::database()->connection('proxy_logger');
        $query = "SELECT * FROM servicepanel_bridge_log WHERE action = 'INSERT'";
        
        try {
            $stored = $db_raw->select($query);
            return $stored;
        } catch (\Throwable $th) {
            return 'Não foi possível se conectar com o banco, o servidor recusou ativamente!';
        }
    }


    public function getUpdateLog(){
        $db_raw = AppCapsule::database()->connection('proxy_logger');
        $query = "SELECT * FROM servicepanel_bridge_log WHERE action = 'UPDATE'";
        
        try {
            $stored = $db_raw->select($query);
            return $stored;
        } catch (\Throwable $th) {
            return 'Não foi possível se conectar com o banco, o servidor recusou ativamente!';
        }
    }

    public function getLogs(){
        $db_raw = AppCapsule::database()->connection('proxy_logger');
        $query = "SELECT * FROM servicepanel_bridge_log ORDER BY id DESC";
        
        try {
            $stored = $db_raw->select($query);
            return $stored;
        } catch (\Throwable $th) {
            return 'Não foi possível se conectar com o banco, o servidor recusou ativamente!';
        }
    }

}