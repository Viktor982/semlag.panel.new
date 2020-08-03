<?php

namespace NPDashboard\Repositories;

use NPCore\AppCapsule;
use Illuminate\Database\Eloquent\Model;
use NPDashboard\Models\CupomInfo;

class CupomInfoRepository extends Repository{

    public function getModel()
    {
       return (new CupomInfo());
    }
}