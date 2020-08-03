<?php
namespace NPDashboard\Repositories;


use NPCore\AppCapsule;
use Illuminate\Database\Eloquent\Model;
use NPDashboard\Models\ServerPools;
use NPDashboard\Models\NewServerPools;

class ServerPoolsRepository extends Repository
{
    public function getModel(){

        return (new ServerPools());
    }
    
    public function getNewModel(){

        return (new NewServerPools());
    }

    public function getRow($name){

        return $this->getModel()->where('name', '=', $name)
                    ->get()
                    ->first();
    
    }

    public function insertServerPools($ip, $name){
        try{
            return $this->getModel()->create([
            'name' => $name,
            'ip' => $ip

         ]);
        } 
        catch (\Throwable $th) {
            die("<h1><p>Já existe um registro com estas características!</p><p>Cheque os valores e tente novamente.</p></h1>");
        
        }
    }    
    public function newPoolSystemInsert($pool_id, $ip){
        try{
            return $this->getNewModel()->create([
            'pool_id' => $pool_id,
            'ip' => $ip
         ]);
        } 
        catch (\Throwable $th) {
            die("<h1><p>Já existe um registro com $pool_id e $ip!</p><p>Cheque os valores e tente novamente.</p></h1>");
        }
    }

    public function newPoolRelationalInsert($id, $name){
        $fetch_query = "SELECT * FROM server_pools_new WHERE server_id = $id";
        $qry = "INSERT INTO server_pools_new (server_id, name, state, updated_at) VALUES ('$id', '$name', '1', NOW())";
        $db_raw = AppCapsule::database()->connection('bd_alias');
        $insert = $db_raw->select($qry);
        return $db_raw->select($fetch_query);
    }

    public function deleteServerPool($name)
    {
        return $this->getModel()
        ->where('name', $name)
        ->delete();
    }
    public function updateServerPool($name, $ip, $nameId)
    {
        return $this->getModel()->where('name','=', $nameId)
           ->update([
           'name' => $name,
           'ip' => $ip
        ]);
    }

    public function concatServerPools($poolId, $serverId){
        
        $qry = "INSERT INTO server_pools_x_servers (pool_id, server_id)
                VALUES ($poolId, $serverId)";
        $db_raw = AppCapsule::database()->connection('bd_alias');
        return $db_raw->select($qry);

    }

    public function concatPoolNames(){
        $qry = "SELECT * FROM server_pools
                INNER JOIN server_pools_x_servers on server_pools_x_servers.pool_id = server_pools.id";
        $db_raw = AppCapsule::database()->connection('bd_alias');
        return $db_raw->select($qry);
    }



}

