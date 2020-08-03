<?php

namespace NPDashboard\Repositories;

use NPCore\AppCapsule;
use Illuminate\Database\Eloquent\Model;
use NPDashboard\Models\NetworkGameInfo;


class NetworkGameInfoRepository extends Repository{   
    public function getModel()
    {
       return (new NetworkGameInfo());
    }

    public function networkGameInfo()
    {
        $db_raw = AppCapsule::database()->connection('bd_alias');
        $qry = "call average_pps_kbps_rulegroup()";
        return $db_raw->select($qry);

    }
}