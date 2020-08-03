<?php

namespace NPDashboard\Repositories;

use NPDashboard\Models\RuleFilterRemotePort;

class RuleFilterRemotePortRepository extends Repository
{
    /**
     * @return \Illuminate\Database\Eloquent\Model|RuleFilterRemotePort
     */
    public function getModel()
    {
        return (new RuleFilterRemotePort());
    }


    public function insertNewRemotePort($identifier, $protocol)
    {
        $exist = $this->getModel()->where([['identifier', '=', $identifier], ['protocol', '=', $protocol]])->first();
        if ($exist)
            return $exist;

        return $this->getModel()->create([
            'identifier' => $identifier,
            'protocol' => $protocol
        ]);
    }

}