<?php

namespace NPDashboard\Repositories;

use Illuminate\Database\Eloquent\Model;
use NPDashboard\Repositories\Repository;
use NPDashboard\Models\FakeXserver;

class FakeXserverRepository extends Repository
{
    public function getModel()
    {
        return (new FakeXserver());
    }

    public function registerNewFakeRelation($fake_id, $server_id)
    {
        $created = $this->getModel()->create([
            'fake_id' => $fake_id,
            'server_id' => $server_id]);
        return $created;
    }

}