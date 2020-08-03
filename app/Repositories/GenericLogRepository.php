<?php

namespace NPDashboard\Repositories;

use NPCore\AppCapsule;
use Illuminate\Database\Eloquent\Model;
use NPDashboard\Models\GenericLog;

class GenericLogRepository extends Repository{   
    
    public function getModel()
    {
       return (new GenericLog());
    }
    
    public function getGenericLogData()
    {
        $today = date('d-m-Y H:i:s');
        $three_days = date('d-m-Y H:i:s', strtotime('-3 days', strtotime($today)));
        
        return $this->getModel()->distinct('user_email')
                                ->select('user_email', 'data', 'created_at', 'software_version')
                                ->orderBy('created_at', 'DESC')
                                ->limit(3000)
                                ->get();

    }

    public function getGenericLogDataBySoftwareVersion($software_version)
    {
        $today = date('d-m-Y H:i:s');
        $three_days = date('d-m-Y H:i:s', strtotime('-3 days', strtotime($today)));
        
        return $this->getModel()->distinct('user_email')
                                ->select('user_email', 'data', 'created_at', 'software_version')
                                ->where('software_version', '=', $software_version)
                                ->orderBy('created_at', 'DESC')
                                ->limit(3000)
                                ->get();

    }
    
}