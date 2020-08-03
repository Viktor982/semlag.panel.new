<?php

namespace NPDashboard\Repositories;


use NPCore\AppCapsule;
use NPDashboard\Models\RuleAliasRuleGroup;
use NPDashboard\Repositories\Bridge\InfoRepository;
use NPDashboard\Repositories\FakeXrulegroupRepository;

class RuleAliasRulegroupRepository extends Repository
{
    /**
     * @return \Illuminate\Database\Eloquent\Model|RuleGroup
     */
    public function getModel()
    {
        return (new RuleAliasRuleGroup());
    }

    public function return_json($code, $message, $detail = null){
        $response = array('code' => $code, 'message' => $message, 'detail' => $detail);
        return json_encode($response);
    }
    /**
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model[]|RuleGroup[]
     */
    public function getFullAliasRuleGroups()
    {
        return $this->getModel()->all();
    }

    /**
     * @param $rulegroup_id
     * @param $alias_id
     * @return mixed
     */

    public function insertAliasToRuleGroup($rulegroup_id, $alias_id)
    {
        $exist = $this->getModel()->where([['id_rulegroup', '=', $rulegroup_id], ['id_alias', '=', $alias_id]])->first();
        if(!$exist) {
            return $this->getModel()->create([
                'id_rulegroup' => $rulegroup_id,
                'id_alias' => $alias_id
            ]);
        }
        return $exist;
    }

    public function checkRulegroupXfinalRelations($rulegroup_id){
        $db_raw = AppCapsule::database()->connection('bd_alias');
        $qry = "SELECT rrxs.id_alias FROM rules_rulegroup_x_servers rrxs
                INNER JOIN servers ON rrxs.id_alias = servers.id
                WHERE servers.type = 'FINAL' AND rrxs.id_alias = servers.id AND rrxs.id_rulegroup = $rulegroup_id";
        return $db_raw->select($qry);
    }

    public function insertAliasToRelatedRuleGroup($rulegroup_id, $alias_id)
    {
        $info_repository = new InfoRepository();
        $check_final =  $info_repository->getFinalById($alias_id);  
        $all_relations = $this->checkRulegroupXfinalRelations($rulegroup_id);
        $exist = $this->getModel()->where([['id_rulegroup', '=', $rulegroup_id], ['id_alias', '=', $alias_id]])->first();
        if(!$exist) {
            if(count($check_final) == 1 && count($all_relations) >= 1){
                return $this->getModel()->where('id_rulegroup', '=', $rulegroup_id)
                                        ->where('id_alias', '=', $all_relations[0]->id_alias)
                                        ->update([
                                                'id_rulegroup' => $rulegroup_id,
                                                'id_alias' => $alias_id
                                            ]);
        }else{
            return $this->getModel()->create([
                'id_rulegroup' => $rulegroup_id,
                'id_alias' => $alias_id
            ]);
           }
        }
        return $exist;
    }

    public function removeAliasRuleGroup($rulegroupId, $aliasId)
    {
        $this->getModel()->where([['id_rulegroup', '=', $rulegroupId], ['id_alias', '=', $aliasId]])->delete();
    }

    public function getAliasRuleGroupsConcat()
    {
        try {
            $db_raw = AppCapsule::database()->connection('bd_alias');
            $qry = "SELECT
            servers.id            AS 'alias_id',
            servers.ip            AS 'alias_ip',
            servers.rules_type    AS 'rules_type',
            servers.display_name  AS 'display_name',
            servers.others        AS 'others',
            servers.process_name  AS 'process_name',
            countrys.name         AS 'country',
            countrys.fullname     AS 'country_fullname',
            (SELECT DISTINCT GROUP_CONCAT(rules.id_rulegroup SEPARATOR ',')
            FROM rules_rulegroup_x_servers rules
            WHERE rules.id_alias = servers.id) AS rule_group_list
            FROM servers
            LEFT JOIN countrys ON countrys.id = servers.country_id
            WHERE servers.type = 'FINAL'";

            $original_relation = $db_raw->select($qry);
            return $original_relation;
        }catch (\Throwable $th) {
             return $this->return_json(500,'INTERNAL_SERVER_ERROR', 'Something went wrong with SQL!');
        }

    }
    
    public function getAliasRuleGroupsConcatWithFake()
    {
        try {
            $db_raw = AppCapsule::database()->connection('bd_alias');
            $qry = "SELECT
            servers.id            AS 'alias_id',
            servers.ip            AS 'alias_ip',
            servers.rules_type    AS 'rules_type',
            servers.display_name  AS 'display_name',
            servers.others        AS 'others',
            servers.process_name  AS 'process_name',
            countrys.name         AS 'country',
            countrys.fullname     AS 'country_fullname',
            (SELECT DISTINCT GROUP_CONCAT(rules.id_rulegroup SEPARATOR ',')
            FROM rules_rulegroup_x_servers rules
            WHERE rules.id_alias = servers.id) AS rule_group_list
            FROM servers
            LEFT JOIN countrys ON countrys.id = servers.country_id
            WHERE servers.type = 'FINAL'";

            $original_relation = $db_raw->select($qry);
            $fake_relation = FakeXrulegroupRepository::getFakeAliasRuleGroupsConcat();
            $merged_relation = array_merge($fake_relation, $original_relation);

            return $merged_relation;
        }catch (\Throwable $th) {
             return $this->return_json(500,'INTERNAL_SERVER_ERROR', 'Something went wrong with SQL!');
        }

    }

}