<?php


namespace NPDashboard\Repositories;

use Illuminate\Database\Eloquent\Model;
use NPDashboard\Models\Trial;
use NPDashboard\Repositories\Repository;

class TrialsRepository extends Repository
{
    public function findByToken($token)
    {
        if(! is_array($token))
            $token = [$token];

        return $this->databaseManager()
            ->table('trial')
            ->select('date','utoken', 'freed_location', 'freed_address')
            ->whereIn('utoken', $token)
            ->get();
    }

    /**
     * @return Trial
     */
    public function getModel()
    {
        return (new Trial());
    }
}