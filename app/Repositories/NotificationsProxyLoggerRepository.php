<?php

namespace NPDashboard\Repositories;

use NPCore\AppCapsule;
use Illuminate\Database\Eloquent\Model;
use NPDashboard\Models\NotificationsProxyLogger;


class NotificationsProxyLoggerRepository extends Repository{   
    
    public function getModel()
    {
       return (new NotificationsProxyLogger());
    }
 
    public function getUsersOnline()
    {
        $query = 'SELECT DISTINCT COUNT(id_client) as users_online
                   FROM client_notifications
                   WHERE updated_at
                   BETWEEN timestamp(DATE_SUB(NOW(), INTERVAL 6 MINUTE)) AND timestamp(NOW())';

        $bd = AppCapsule::database()->connection('proxy_logger');

        return $bd->select($query);
    }
    
    public function getUserCount()
    {
        $query = 'SELECT DISTINCT COUNT(id_client) as users_total FROM client_notifications';
        $bd = AppCapsule::database()->connection('proxy_logger');
        return $bd->select($query);
    }
}