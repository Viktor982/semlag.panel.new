<?php


namespace NPDashboard\Repositories;

use NPCore\AppCapsule;

class AffiliatesRepository
{

    private $manager;

    public function __construct()
    {
        $this->manager = AppCapsule::database();
    }

    public function sales()
    {
        return $this->manager
            ->table('venda')
            ->select('id', 'affiliated_id', 'status', 'data_vigencia', 'date_approved')
            ->where('status', 2)
            ->where('affiliated_id', '!=', null)
            ->get()
            ->groupBy('affiliated_id');
    }

    public function registers()
    {
        return $this->manager
            ->table('usuario')
            ->select('affiliated_reference_id', 'date_created')
            ->where('affiliated_reference_id', '!=', null)
            ->get()
            ->groupBy('affiliated_reference_id');
    }

    public function accesses()
    {
        return $this->manager
            ->table('affiliated_access')
            ->select('affiliated_id', 'date')
            ->get()
            ->groupBy('affiliated_id');
    }
    
    public function actives()
    {
        return $this->manager
            ->table('usuario')
            ->selectRaw('count(id) as customers, affiliated_reference_id as afiliado')
            ->where('affiliated_reference_id','!=', NULL)
            ->whereRaw('vip_time > NOW()')
            ->groupBy('afiliado')
            ->get();
    }
    public function vipUsers()
    {
        return $this->manager
            ->table('usuario')
            ->where('vip_time', '<>', null)
            ->where('vip_time', '>', date("Y-m-d"))
            ->get();
    }
}