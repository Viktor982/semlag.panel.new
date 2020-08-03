<?php

namespace NPDashboard\Repositories\Bridge;

use NPCore\AppCapsule;
use Illuminate\Database\Eloquent\Model;
use NPDashboard\Repositories\Repository;
use NPDashboard\Models\Bridge\BridgeInfo;
use NPDashboard\Models\Bridge\FinalIpRelations;

class InfoRepository extends Repository
{
    public function getModel()
    {
        return (new BridgeInfo());
    }

    public function updateRulesTypeByName($name, $rules_type){
        $update = $this->getModel()->where('name', $name)->update([
            'rules_type' => (int)$rules_type]);
        return $update;
    }

    public function existByName($alias_name){
        $_return = $this->getModel()->where('name', $alias_name)->orderBy('updated_at', 'DESC')->get();
        return $_return;
    }

    public function finalExistByName($alias_name){
        $_return = $this->getModel()->where('name', $alias_name)->where('type', '=', 'FINAL')->orderBy('updated_at', 'DESC')->get();
        return $_return;
    }

    public function bridgeExistByName($alias_name){
        $_return = $this->getModel()->where('name', $alias_name)->where('type', '=', 'BRIDGE')->orderBy('updated_at', 'DESC')->get();
        return $_return;
    }

    public function existByIp($ip)
    {
        return $this->getModel()->where('ip', '=', $ip)->first();
    }

    public function existToken($token)
    {
        $exist = $this->getModel()->where([['token', '=', $token]])->first();
        return (bool)$exist;
    }    

    public function existByDisplayName($display_name)
    {
        return $this->getModel()->where('display_name', '=', $display_name)->first();
    }

    public function serversWithToken($token)
    {
        return $this->getModel()->where('token', $token)->get();
    }

    public function getBridges()
    {
        return $this->getModel()->where('type', 'BRIDGE')->orderBy('updated_at', 'DESC')->get();
    }

    public function getFinals()
    {
        return $this->getModel()->where('type', 'FINAL')->orderBy('updated_at', 'DESC')->get();
    }

    public function getUsage()
    {
        return $this->getModel()->select('id', 'users_tcp_online', 'users_udp_online')->orderBy('updated_at', 'DESC')->get();
    }

    public function getPanelBridges()
    {
        $db_raw = AppCapsule::database()->connection('bd_alias');
        $query = "SELECT
                    *, FALSE as route_calc_status,
                    CASE
                      WHEN updated_at > timestamp(DATE_SUB(NOW(), INTERVAL 10 MINUTE)) THEN 'Online'
                      WHEN updated_at < timestamp(DATE_SUB(NOW(), INTERVAL 10 MINUTE)) THEN 'Offline'
                    END
                     as status
                    from servers where type = 'BRIDGE'";
        return $db_raw->select($query);
    }

    public function getPanelFinals()
    {
        $db_raw = AppCapsule::database()->connection('bd_alias');
        $query = "SELECT
                    *, FALSE as route_calc_status,
                    CASE
                      WHEN updated_at > timestamp(DATE_SUB(NOW(), INTERVAL 10 MINUTE)) THEN 'Online'
                      WHEN updated_at < timestamp(DATE_SUB(NOW(), INTERVAL 10 MINUTE)) THEN 'Offline'
                    END as status
                    from servers where type = 'FINAL'";
        return $db_raw->select($query);
    }

    public function getAll()
    {
        return $this->getModel()->orderBy('updated_at', 'DESC')->get();
    }

    public function getFinalById($id)
    {
        return $this->getModel()->where('id','=', $id)->where('type', 'FINAL')->orderBy('updated_at', 'DESC')->get();
    }

    public function getById($id)
    {
        return $this->getModel()->where('id','=', $id)->orderBy('updated_at', 'DESC')->get();
    }

    public function getServersForPingInfo(){
        return $this->getModel()->select('id', 'name', 'type', 'ip')->where('id','=', $id)->orderBy('updated_at', 'DESC')->get();
    }

    /*Custom Queries*/
    public function existByIpType($ip, $type, $where)
    {
        if($where == 'type'){
            return $this->getModel()->where(['ip' => $ip, 'type' => $type])->first();
        }elseif($where == 'ip'){
            return $this->getModel()->where(['ip' => $ip])->first();    
        }
    }

    public function bridgeExistByIp($ip){
        return $this->getModel()->where('ip', '=', $ip)->where('type', '=', 'bridge')->first();
    }

    public function getBridgeRulegroupRelation($id){
        $db_raw = AppCapsule::database()->connection('bd_alias');
        $query = "SELECT ss.ip, ss.port_udp, ss.port_tcp FROM servers ss
                  INNER JOIN rules_rulegroup_x_servers rrxs ON rrxs.id_alias = ss.id
                  WHERE ss.type = 'BRIDGE' AND rrxs.id_rulegroup = $id";
        return $db_raw->select($query);
    }

    public function setMonitorConfigIp($ip){
        $db_raw = AppCapsule::database()->connection('bd_alias');
        $query = "INSERT IGNORE INTO server_has_monitor_config (ip) VALUES ('$ip')";
        $monitor = $db_raw->select($query);
        return $monitor;
    }

    public function registerNewBridge(array $options)
    {
        $logger = new ProxyLoggerRepository();
        if($options['permission_level'] == null){
            $options['permission_level'] = 10;
        }
        $created = $this->getModel()->create([
            'name' => $options['name'],
            'display_name' => $options['display_name'],
            'bind_ip' => $options['bind_ip'],
            'ip' => $options['ip'],
            'nearest_ip' => $options['nearest_ip'],
            'port_tcp' => $options['port_tcp'],
            'port_udp' => $options['port_udp'],
            'core' => $options['core'],
            'token' => $options['token'],
            'type' => $options['type'],
            'country_id' => $options['country_id'],
            'network_limit' => $options['network_limit'],
            'rules_type' => $options['permission_level']
        ]);
        $ip = $options['ip'];
        $monitor = $this->setMonitorConfigIp($ip);

        if($created){
            $user = authenticated()->username;
            $server_id = $created->id;
            $params = array('user'      => $user,
                            'message'   => "User ".$user." created server ".$created->name." at ".date('Y-m-d H:i:s').".",
                            'date'      => date('Y-m-d H:i:s'),
                            'server_id' => $created->id,
                            'action'   => "INSERT");
            $logger->storeLog($params);
        }
        
        return $created;
    }

    public function createIpsRelation($server_id, $ip)
    {
        $relation = new FinalIpRelations();
        return $relation->create([
                    'server_id' => $server_id,
                    'ip'        => $ip
        ]);

    }

    public function getServerIpsRelations($server_id)
    {
        $relation = new FinalIpRelations();
        return $relation->select('ip')
                        ->where('server_id', '=', $server_id)
                        ->get();
    }
    
    public function updateServerIpsRelations($old_ip, $new_ip)
    {
        $relation = new FinalIpRelations();
        return $relation->where('ip', '=',$old_ip)
                        ->update(['ip' =>  $new_ip]);
    }

    public function deleteServerIpsRelations($ip)
    {
        $relation = new FinalIpRelations();
        return $relation->where('ip','=', $ip)
                        ->delete();
    }
    

    public function getLauncherBridgeRelation($display_name){
        $qry = "SELECT ss.ip as ipv4, ss.port_tcp as tcp_port, ss.port_udp as udp_port FROM servers ss
                INNER JOIN server_x_fake_alias sxfa ON ss.id = sxfa.server_id
                INNER JOIN fake_alias_info fai ON sxfa.fake_id = fai.id
                LEFT JOIN rules_rulegroup_x_fake_alias rrxfa ON rrxfa.fake_id = fai.id
                WHERE rrxfa.id_rulegroup = (SELECT rrxfa.id_rulegroup
                                            FROM rules_rulegroup_x_fake_alias rrxfa
                                            INNER JOIN fake_alias_info fai ON rrxfa.fake_id = fai.id
                                            WHERE fai.display_name = '$display_name' LIMIT 1)
                                
                ";
        $db_raw = AppCapsule::database()->connection('bd_alias');
        return $db_raw->select($qry);
    }

    public function getFakeLauncher($id){
        $qry = "SELECT fai.id, sxfa.server_id FROM fake_alias_info fai
                    INNER JOIN server_x_fake_alias sxfa ON fai.id = sxfa.fake_id
                    WHERE sxfa.server_id = $id AND fai.launcher = 1";
        $db_raw = AppCapsule::database()->connection('bd_alias');
        return $db_raw->select($qry);
    }

    public function getFakeAliasById($alias_id){
        $qry = "SELECT fai.launcher, sxfa.server_id FROM fake_alias_info fai
                INNER JOIN server_x_fake_alias as sxfa ON sxfa.fake_id = fai.id WHERE sxfa.server_id = $alias_id";
        $db_raw = AppCapsule::database()->connection('bd_alias');
        return $db_raw->select($qry);
    }

    public function isLauncherByDisplayName($display_name){
        $qry = "SELECT launcher FROM fake_alias_info WHERE display_name = '$display_name'";
        $db_raw = AppCapsule::database()->connection('bd_alias');
        return $db_raw->select($qry);
    }

    public function getFinalByDisplayName($display_name){
        $qry = "SELECT fai.launcher, sxfa.server_id FROM fake_alias_info fai
                INNER JOIN server_x_fake_alias as sxfa ON sxfa.fake_id = fai.id WHERE sxfa.server_id = $alias_id";
        $db_raw = AppCapsule::database()->connection('bd_alias');
        return $db_raw->select($qry);
    }


}