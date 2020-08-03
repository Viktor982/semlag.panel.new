<?php

namespace NPDashboard\Repositories;


use NPCore\AppCapsule;
use NPDashboard\Models\RulegroupOptions;

class RulegroupOptionsRepository extends Repository
{
    /**
     * @return \Illuminate\Database\Eloquent\Model|RuleGroup
     */
    public function getModel()
    {
        return (new RulegroupOptions());
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
    
    public function showOptions()
    {   
        $qry = "SELECT id_rulegroup, options_name, options_value from rules_rulegroup_options";
        $db_raw = AppCapsule::database()->connection('bd_alias');
        
        return $db_raw->select($qry);
    }


     public function insertOptionsToRuleGroup($idRulegroup,$optionsName, $optionsValue)
    {       
        $exist =  $this->getModel()->create([
            'id_rulegroup'  => $idRulegroup,
            'options_name'  => $optionsName,
            'options_value' => $optionsValue
         ]);

         return $exist;
    }
    

    public function removeRulegroupOptions($rulegroupId, $optionsName, $optionsValue)
    {
        $this->getModel()->where([['id_rulegroup', '=', $rulegroupId], ['options_name', '=', $optionsName], ['options_value', '=', $optionsValue]])->delete();
    }

}