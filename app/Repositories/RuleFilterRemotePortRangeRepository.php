<?php

namespace NPDashboard\Repositories;

use NPDashboard\Models\RuleFilterRemotePortRange;

class RuleFilterRemotePortRangeRepository extends Repository
{
    /**
     * @return \Illuminate\Database\Eloquent\Model|RuleFilterRemotePortRange
     */
    public function getModel()
    {
        return (new RuleFilterRemotePortRange());
    }


    public function insertNewRemotePortRange($id_remote_port, $min, $max)
    {
        $exist = $this->getModel()->where([
            ['id_remote_port', '=', $id_remote_port],
            ['min', '=', $min],
            ['max', '=', $max]
        ])->first();
        if ($exist)
            return $exist;

        return $this->getModel()->create([
            'id_remote_port' => $id_remote_port,
            'min' => $min,
            'max' => $max
        ]);
    }

}