<?php

namespace NPDashboard\Repositories;

use Illuminate\Database\Eloquent\Model;
use NPDashboard\Repositories\Repository;
use NPDashboard\Models\ClientGameInfoLogger;
use NPCore\AppCapsule;

class ClientGameInfoLoggerRepository extends Repository
{
    /**
     * @return ClientGameInfoLogger
     */
    public function getModel()
    {
        return (new ClientGameInfoLogger());
    }

    /**
     * @param $id
     * @return mixed
     */
    public function playedGamesTrial()
    {
        $proxy_logger = AppCapsule::database()->connection('proxy_logger');
        
        $query = "SELECT DISTINCT cgi.rulegroup_name FROM client_game_info cgi
                    INNER JOIN client_info ci ON ci.id = cgi.client_id
                    WHERE ci.is_trial = 1";
        $result = $proxy_logger->select($query);
        
        
        return $result;
    }
    
}