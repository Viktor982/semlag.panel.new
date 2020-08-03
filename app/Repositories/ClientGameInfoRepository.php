<?php

namespace NPDashboard\Repositories;

use NPCore\AppCapsule;
use Illuminate\Database\Eloquent\Model;
use NPDashboard\Models\ClientGameInfo;

class ClientGameInfoRepository extends Repository{   
    public function getModel()
    {
       return (new ClientGameInfo());
    }
    
    public function getAlias()
    {
        $db_raw = AppCapsule::database()->connection('bd_alias');
        $qry =  "call get_alias(1)";
        return $db_raw->select($qry);
    }
    
    public function getAliasTotal()
    {
        $db_raw = AppCapsule::database()->connection('bd_alias');
        $qry =  "call get_alias(0)";
        return $db_raw->select($qry);       
    }
    
    public function getOldAlias()
    {
        $db_raw = AppCapsule::database()->connection('bd_alias');
        $qry = "call old_get_alias(1)";
        return $db_raw->select($qry);
    }

    public function getOldAliasTotal()
    {
        $db_raw = AppCapsule::database()->connection('bd_alias');
        $qry = "call old_get_alias(0)";
        return $db_raw->select($qry);
    }
    
    public function getRulegroupInUse()
    {
        $db_raw = AppCapsule::database()->connection('bd_alias');
        $qry = "call get_rulegroup(1)";
        return $db_raw->select($qry);
    }

    public function getRulegroupConnectionByPeriod($init, $end){
        $db_raw = AppCapsule::database()->connection('bd_alias');
        $qry = "SELECT GROUP_CONCAT(DISTINCT cgi.id_email) AS player_id,
                COUNT(DISTINCT cgi.id_email) AS 'player_quantity', cgi.id_rulegroup, COUNT(cgi.id_rulegroup) AS 'connection_count',
                cgi.created_at,
                rr.id_rulegroup, rr.rule_rulegroup_fullname
                FROM client_game_info cgi 
                INNER JOIN rules_rulegroup rr
                ON rr.id_rulegroup = cgi.id_rulegroup WHERE cgi.created_at
                BETWEEN '$init' AND '$end' GROUP BY cgi.id_rulegroup ORDER BY player_quantity DESC";
        return $db_raw->select($qry);
    }

    public function liveRulesUse(){
        $db_raw = AppCapsule::database()->connection('bd_alias');
        $qry = "SELECT GROUP_CONCAT(DISTINCT cgi.id_email) AS player_id,
                COUNT(DISTINCT cgi.id_email) AS 'player_quantity', cgi.id_rulegroup, COUNT(cgi.id_rulegroup) AS 'connection_count',
                cgi.created_at,
                rr.id_rulegroup, rr.rule_rulegroup_fullname
                FROM client_game_info cgi 
                INNER JOIN rules_rulegroup rr
                ON rr.id_rulegroup = cgi.id_rulegroup WHERE cgi.created_at BETWEEN NOW() - INTERVAL 5 MINUTE AND NOW()
                GROUP BY cgi.id_rulegroup ORDER BY player_quantity DESC";
                
        return $db_raw->select($qry);
    }

    public function getTotalPlayersNewVersion($param){
        if($param === true){
        $db_raw = AppCapsule::database()->connection('bd_alias');
            $qry = "SELECT * FROM client_info
            WHERE version != ''";
            return count($db_raw->select($qry));
        }else{
            $db_raw = AppCapsule::database()->connection('bd_alias');
            $qry = "SELECT * FROM client_info
            WHERE last_update BETWEEN CONVERT_TZ(NOW(), @@session.time_zone, '+00:00') - INTERVAL 5 MINUTE AND CONVERT_TZ(NOW(), @@session.time_zone, '+00:00')
            AND version != ''";
            return count($db_raw->select($qry));
        }
    }

    public function getRulegroupTotal()
    {
        $db_raw = AppCapsule::database()->connection('bd_alias');
        $qry = "call get_rulegroup(0)";
        return $db_raw->select($qry);
    }
    
}