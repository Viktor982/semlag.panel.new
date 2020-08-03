<?php


namespace NPDashboard\Repositories;

use NPCore\AppCapsule;
use Illuminate\Database\Eloquent\Model;
use NPDashboard\Repositories\Repository;
use NPDashboard\Models\Infrastructure\Server;

class ServersRepository extends Repository
{
    public function getModel()
    {
        return (new Server());
    }

    public function getServers(){
        $db_raw = AppCapsule::database()->connection('bd_alias');
        $qry = "SELECT * FROM servers";
        return $db_raw->select($qry);
    }

    public function getServerPools(){
        $db_raw = AppCapsule::database()->connection('bd_alias');
        $qry = "SELECT * FROM servers s LEFT JOIN server_pools sp ON s.name = sp.name";
        return $db_raw->select($qry);
    }

    public function getServerBridges(){
        $db_raw = AppCapsule::database()->connection('bd_alias');
        $qry = "SELECT * FROM servers WHERE type = 'BRIDGE'";
        return $db_raw->select($qry);
    }

    public function getServersWithMonitorConfig()
    {
        $db_raw = AppCapsule::database()->connection('bd_alias');
        $qry = "SELECT * FROM servers s
                RIGHT JOIN  server_has_monitor_config shmc  ON shmc.ip = s.ip
                ORDER BY s.name";
        return $db_raw->select($qry);
    }

    public function getMonitorConfig()
    {
        $db_raw = AppCapsule::database()->connection('bd_alias');
        $qry = "SELECT * FROM   server_has_monitor_config";
        return $db_raw->select($qry);
    }


    public function namesById()
    {
        return $this->databaseManager()
            ->table('server')
            ->select('id', 'name')
            ->get()
            ->pluck('name', 'id');
    }
}