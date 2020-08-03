<?php

namespace NPDashboard\Repositories;

use Illuminate\Database\Eloquent\Model;
use NPDashboard\Repositories\Repository;
use NPDashboard\Models\FakeAlias;

class FakeAliasRepository extends Repository
{
    public function getModel()
    {
        return (new FakeAlias());
    }

    public function getAll()
    {
        return $this->getModel()->all();
    }

    public function registerNewFakeAlias(array $options) 
    {
        $created = $this->getModel()->create([
            'original_name' => $options['original_name'],
            'display_name' => $options['display_name'],
            'country' => $options['country'],
            'country_fullname' => $options['country_fullname'],
            'others' => $options['others'],
            'permission_level' => $options['permission_level']
            ]);
        return $created;
    }

}