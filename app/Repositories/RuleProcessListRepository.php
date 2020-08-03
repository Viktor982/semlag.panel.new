<?php

namespace NPDashboard\Repositories;

use NPDashboard\Models\RuleProcessList;
use NPCore\AppCapsule;

class RuleProcessListRepository extends Repository
{
    /**
     * @return RuleProcessList
     */
    public function getModel()
    {
        return (new RuleProcessList());
    }


    /**
     * @return \Illuminate\Database\Eloquent\Collection|RuleProcessList[]
     */
    public function getFullProcessList()
    {
        return $this->getModel()->all();
    }

    /**
     * @param $process_name
     * @param $rulegroup_id
     * @return mixed
     */
    public function insertProcessList($process_name, $rulegroup_id)
    {
        return $this->getModel()->create([
            'rule_process_name' => $process_name,
            'rule_group_id' => $rulegroup_id
        ]);
    }

    public function removeRulegroupProcess($id)
    {
        return $this->getModel()
        ->where('rule_process_id', $id)
        ->delete();
    }

    public function getProcessWithRulegroup()
    {
        $query = "SELECT rr.id_rulegroup, rr.rule_rulegroup_name, rr.rule_rulegroup_fullname, rr.rule_protocol,
                         rpl.rule_process_id, rpl.rule_process_name, rpl.rule_group_id,
                         GROUP_CONCAT(DISTINCT rxrr.related_id SEPARATOR ', ') as related_id,
                         GROUP_CONCAT(DISTINCT rrdois.rule_rulegroup_name SEPARATOR ', ') as related_name,
                         GROUP_CONCAT(DISTINCT ss.id SEPARATOR ', ') as alias_to_use
                  FROM rules_rulegroup rr
                  INNER JOIN rules_process_list rpl ON rpl.rule_group_id = rr.id_rulegroup
                  LEFT JOIN rulegroup_x_related_rulegroup rxrr ON rxrr.rulegroup_id = rr.id_rulegroup
                  LEFT JOIN rules_rulegroup rrdois ON rrdois.id_rulegroup = rxrr.related_id
                  LEFT JOIN rules_rulegroup_x_servers rrxs ON rrxs.id_rulegroup = rxrr.related_id
                  LEFT JOIN servers ss ON ss.id = rrxs.id_alias AND ss.type = 'FINAL'
                  GROUP BY rpl.rule_process_id";

        $db_raw = AppCapsule::database()->connection('bd_alias');
        return $db_raw->select($query);

    }

}