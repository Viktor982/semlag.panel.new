<?php

namespace NPDashboard\Repositories;

use NPCore\AppCapsule;
use NPDashboard\Models\RuleGroup;

class RuleRulegroupRepository extends Repository
{
    /**
     * @return RuleGroup
     */
    public function getModel()
    {
        return (new RuleGroup());
    }

    public function getQuery()
    {
        $qry = "SELECT * FROM rules_rulegroup";

        $db_raw = AppCapsule::database()->connection('bd_alias');
        return $db_raw->select($qry);
    }
    /**
     * @return \Illuminate\Database\Eloquent\Collection|RuleGroup[]
     */
    public function getFullRuleGroups()
    {
        return $this->getModel()->all();
    }

    
    public function getAliasFromRulegroup($id)
    {
        $qry = "SELECT al.id_alias, a.`name` FROM rules_rulegroup rr
                LEFT JOIN rules_rulegroup_x_servers al ON rr.id_rulegroup = al.id_rulegroup
                LEFT JOIN servers as a ON a.id = al.id_alias
                WHERE rr.id_rulegroup = $id";

        $db_raw = AppCapsule::database()->connection('bd_alias');
        return $db_raw->select($qry);
    }
    
    public function getRulesProcess(){
        $qry = "SELECT * FROM rules_process_list rpl 
                INNER JOIN rules_rulegroup rr
                ON rpl.rule_group_id = rr.id_rulegroup";
        $db_raw = AppCapsule::database()->connection('bd_alias');
        return $db_raw->select($qry);
    }

    public function insertIntoRelatedRulegroups($rulegroup, $related){
        $qry = "INSERT INTO rulegroup_x_related_rulegroup (rulegroup_id, related_id)
                VALUES ($rulegroup, $related)";
        $db_raw = AppCapsule::database()->connection('bd_alias');
        return $db_raw->select($qry);
    }

    public function getFakeRuleGroupJoin()
    {
        $qry = "SELECT rr.rule_rulegroup_fullname, rr.id_rulegroup, rr.rule_rulegroup_name, rr.rule_protocol, 
                GROUP_CONCAT(fa.id SEPARATOR ', ') as 'alias_id_list',
                GROUP_CONCAT(fa.original_name SEPARATOR ', ') as 'alias_name_list',
                GROUP_CONCAT(fa.display_name SEPARATOR ', ') as 'alias_name_fake_list'
                FROM rules_rulegroup rr
                LEFT JOIN rules_rulegroup_x_fake_alias as al ON rr.id_rulegroup = al.id_rulegroup
                LEFT JOIN fake_alias_info as fa ON fa.id = al.fake_id
                GROUP BY rr.id_rulegroup";

        $db_raw = AppCapsule::database()->connection('bd_alias');
        return $db_raw->select($qry);
    }

    public function getFullRuleGroupJoinWithRelated()
    {
        $qry = "SELECT rr.rule_rulegroup_fullname, rr.id_rulegroup, rr.rule_rulegroup_name, rr.rule_protocol, 
                GROUP_CONCAT(a.id SEPARATOR ', ') as 'alias_id_list',
                GROUP_CONCAT(a.name SEPARATOR ', ') as 'alias_name_list',
                GROUP_CONCAT(DISTINCT rxrr.related_id  SEPARATOR ', ') as 'related_id_list'
                FROM rules_rulegroup rr
                LEFT JOIN rules_rulegroup_x_servers al ON rr.id_rulegroup = al.id_rulegroup
                LEFT JOIN servers as a ON a.id = al.id_alias
                LEFT JOIN rulegroup_x_related_rulegroup as rxrr ON rxrr.rulegroup_id = rr.id_rulegroup
                GROUP BY rr.id_rulegroup";

        $db_raw = AppCapsule::database()->connection('bd_alias');
        return $db_raw->select($qry);
    }

    public function getFullRuleGroupJoin()
    {
        $qry = "SELECT rr.rule_rulegroup_fullname, rr.id_rulegroup, rr.rule_rulegroup_name, rr.rule_protocol, 
                GROUP_CONCAT(a.id SEPARATOR ', ') as 'alias_id_list',
                GROUP_CONCAT(a.name SEPARATOR ', ') as 'alias_name_list'
                FROM rules_rulegroup rr
                LEFT JOIN rules_rulegroup_x_servers al ON rr.id_rulegroup = al.id_rulegroup
                LEFT JOIN servers as a ON a.id = al.id_alias
                GROUP BY rr.id_rulegroup";

        $db_raw = AppCapsule::database()->connection('bd_alias');
        return $db_raw->select($qry);
    }

    public function insertRuleGroup($rulegroup_name, $rulegroup_fullname, $ruleProtocol)
    {
        return $this->getModel()->create([
           'rule_rulegroup_name' => $rulegroup_name,
           'rule_rulegroup_fullname' => $rulegroup_fullname,
           'rule_protocol' => $ruleProtocol
        ]);
    }
    
    
    public function removeShownRulegroup($idRulegroup, $ruleRulegroupName, $ruleProtocol)
    {
        $this->getModel()->where([['id_rulegroup', '=', $idRulegroup], ['rule_rulegroup_name', '=', $ruleRulegroupName], ['rule_protocol', '=', $ruleProtocol]])->delete();
    }


    public function returnId($rulegroup_name)
    {
        $id = $this->getModel()->select('id_rulegroup')
           ->where('rule_rulegroup_name', '=', $rulegroup_name)
           ->get();
           
        return $id;
    }

    public function returnRelationId($id)
    {
        $qry = "SELECT * FROM rulegroup_x_related_rulegroup rxrr 
                WHERE rxrr.related_id = $id";
        $db_raw = AppCapsule::database()->connection('bd_alias');
        return $db_raw->select($qry);
    }

    public function returnAliasRelation($id)
    {
        $qry = "SELECT * FROM rules_rulegroup_x_servers rrxs 
                WHERE rrxs.id_rulegroup = $id";
        $db_raw = AppCapsule::database()->connection('bd_alias');
        return $db_raw->select($qry);
    }

}
