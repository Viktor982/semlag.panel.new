<?php

namespace NPDashboard\Repositories;

use NPCore\AppCapsule;
use Illuminate\Database\Eloquent\Model;
use NPDashboard\Models\Bridge\ServerRanking;

class ServerRankingRepository extends Repository{   

    public function getModel()
    {
       return (new ServerRanking());
    }

    public function setServerRecords($og_server)
    {
        $ranked_server = $this->getRecordById($og_server->id)[0];
        $sum_tcp = isset($ranked_server->sum_tcp) ? $ranked_server->sum_tcp + $og_server->users_tcp_online : 0 + $og_server->users_tcp_online;
        $sum_udp = isset($ranked_server->sum_udp) ? $ranked_server->sum_udp + $og_server->users_udp_online : 0 + $og_server->users_udp_online;
        $tcp_spike = ($ranked_server->spike_tcp + 0) > $og_server->users_tcp_online ? $ranked_server->spike_tcp + 0 : $og_server->users_tcp_online;
        $udp_spike = ($ranked_server->spike_udp + 0) > $og_server->users_udp_online ? $ranked_server->spike_udp + 0 : $og_server->users_udp_online; 
        return $this->getModel()
                    ->updateOrCreate([ 'server_id' => $og_server->id ],
                                     [ 'spike_tcp' => $tcp_spike,
                                       'spike_udp' => $udp_spike,
                                       'sum_tcp' => $sum_tcp,
                                       'sum_udp' => $sum_udp,
                                       'updated_at' => date("Y-m-d H:i:s") ]);
    }

    public function setRanking()
    {
        $i = 1;
        $records = $this->getAll();
        foreach ($records as $key => $value) {
            $this->getModel()->where('server_id', '=', $value->server_id)
                             ->update(['rank' => $i,
                                       'tcp_mean'  => ($value->sum_tcp/24),
                                       'udp_mean'  => ($value->sum_udp/24),
                                       'sum_tcp' => 0,
                                       'sum_udp' => 0,
                                       'updated_at' => date("Y-m-d H:i:s")]);
            $i++;
        }

    }

    public function getRecordById($server_id)
    {
        return $this->getModel()->where('server_id', $server_id)->get();
    }

    public function getAll()
    {
        $qry = "SELECT *, (sum_tcp+sum_udp) AS total
                FROM bridge_info.server_ranking
                ORDER BY total ASC";

        $db_raw = AppCapsule::database()->connection('bd_alias');
        return $db_raw->select($qry);
        
    }

}
