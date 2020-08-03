<?php

namespace NPDashboard\Repositories\Bridge;

use Illuminate\Database\Eloquent\Model;
use NPDashboard\Repositories\Repository;
use NPDashboard\Models\Bridge\BridgeAlias;

class AliasRepository extends Repository
{
    public function getModel()
    {
        return (new BridgeInfo());
    }

    public function registerNewAlias(array $options)
    {
        die("NAO SERA MAIS REGISTRADO POR AQUI");
        
        $created = $this->getModel()->create([
            'id' => $options['id'],
            'alias_name' => $options['alias_name'],
            'ip' => $options['ip'],
            'country' => $options['country'],
            'port_udp' => $options['port_udp'],
            'port_tcp' => $options['port_tcp'],
        ]);
        return $created;
    }

    public function get_alias()
    {
        return $this->getModel()->all();
    }
}