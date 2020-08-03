<?php

namespace NPDashboard\Repositories\Bridge;

use Illuminate\Database\Eloquent\Model;
use NPDashboard\Repositories\Repository;
use NPDashboard\Models\Bridge\MonitorServerExternal;

class MonitorServerRepository extends Repository
{
    public function getModel()
    {
        return (new MonitorServerExternal());
    }

    public function getAll()
    {
        return $this->getModel()->all();
    }

    public function add(array $options)
    {
        $created = $this->getModel()->create([
            'name' => $options['name'],
            'ip_address' => $options['ip_address'],
            'port' => $options['port'],
            'protocol' => $options['protocol'],
            'monitoring' => $options['monitoring'],
            'updated_at' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        return $created;
    }

    public function remove(int $id)
    {
        return $this->getModel()->where('id','=', $id)
                                ->delete();
    }
}