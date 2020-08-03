<?php

namespace NPDashboard\Repositories\RouteDatabase;

use NPCore\AppCapsule;
use NPDashboard\Repositories\Repository;
use NPDashboard\Models\RouteDatabase\BridgeStatus;

class RouteDatabaseRepository extends Repository
{

  public function getModel()
  {
    return (new BridgeStatus());
  }

  public function getBridgeStatus()
  {
    return $this->getModel()->all();
  }

  public function getBridgeAvgPing(){
    $db_raw = AppCapsule::database()->connection('bd_route_database_2');
    
    $query = "SELECT * FROM server_x_server_latency sxsl
              GROUP BY sxsl.ipd
              ORDER BY sxsl.updated_at DESC";
    return $db_raw->select($query);
  }

  public function getAllServers()
  {
    $db_raw = AppCapsule::database()->connection('bd_route_database_2');
    
    $query = "SELECT id, name, ip, type, updated_at
              FROM servers";
    return $db_raw->select($query);
  }

  public function getServerById($id)
  {
    $db_raw = AppCapsule::database()->connection('bd_route_database_2');
    return $db_raw->select("SELECT name, ip FROM servers WHERE id = '$id'");
  }
  
  public function getPingsPerServer($ip){
    $db_raw = AppCapsule::database()->connection('bd_route_database_2');
    
    $query = "SELECT DISTINCT sxsl.ipd, sxsl.loss, sxsl.icmpmin, sxsl.icmpavg, sxsl.icmpmax, sxsl.updated_at
              FROM RouteDatabase4.server_x_server_latency sxsl
              WHERE sxsl.ipo = '$ip'
              ORDER BY sxsl.updated_at";

    return $db_raw->select($query);
  }

}