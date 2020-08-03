<?php

namespace NPDashboard\Repositories;

use NPCore\AppCapsule;
use Illuminate\Database\Eloquent\Model;
use NPDashboard\Models\ClientLog;

class ClientLogRepository extends Repository{   

    public function getModel()
    {
       return (new ClientLog());
    }    

    public function getTotalUsers()
    {
        return count($this->getModel()->all());
    }

}