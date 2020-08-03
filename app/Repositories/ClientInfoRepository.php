<?php

namespace NPDashboard\Repositories;

use NPCore\AppCapsule;
use Illuminate\Database\Eloquent\Model;
use NPDashboard\Models\ClientInfo;

class ClientInfoRepository extends Repository{   

    public function getModel()
    {
       return (new ClientInfo());
    }

    public function getUserByType($type){        
        $db_raw = AppCapsule::database()->connection('bd_alias');
        $qry = "SELECT * FROM client_info WHERE type = $type";
        return $db_raw->select($qry);
    }

    public function updateTypeByEmail($email, $type){
        $update = $this->getModel()->where('email', $email)->update([
                                                 'type' => (int)$type]);
        return $update;
    }

    /**
     * SELECT COUNT(*) FROM client_info
        WHERE last_update BETWEEN NOW() - INTERVAL 5 MINUTE AND NOW()
     */
    public function getUsersOnline()
    {
        $db_raw = AppCapsule::database()->connection('bd_alias');
        $qry = "call get_users_online()";

        return $db_raw->select($qry);
    }
    
    public function getTotalUsers()
    {
        return count($this->getModel()->all());
    }

}