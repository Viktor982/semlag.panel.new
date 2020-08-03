<?php

namespace NPDashboard\Repositories\Bridge;

use Illuminate\Database\Eloquent\Model;
use NPDashboard\Repositories\Repository;
use NPDashboard\Models\Bridge\LauncherBridgeInfo;
use NPCore\AppCapsule;

class LauncherBridgeInfoRepository extends Repository
{
    public function getModel()
    {
        return (new BridgeInfo());
    }
    
    public function getAllRelations(){
        $qry = "SELECT DISTINCT 
                GROUP_CONCAT((SELECT ss.name FROM servers ss 
                              INNER JOIN server_x_bridge_info sxbi ON sxbi.related_id = ss.id 
                              WHERE ss.id = sxbi.related_id) SEPARATOR ', ') as relation_list,
                ss.id, ss.name, ss.ip as ipv4, ss.port_tcp as tcp_port, ss.port_udp as udp_port FROM servers ss
        LEFT JOIN server_x_bridge_info sxbi ON sxbi.server_id = ss.id WHERE ss.type = 'FINAL' AND sxbi.server_id = ss.id
        GROUP BY ss.name";
        $query = "SELECT ss.name FROM servers ss 
                  INNER JOIN server_x_bridge_info sxbi ON sxbi.related_id = ss.id 
                  WHERE ss.id = sxbi.related_id";
        $db_raw = AppCapsule::database()->connection('bd_alias');
        
        return $db_raw->select($qry);
    }
}