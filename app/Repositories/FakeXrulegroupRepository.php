<?php

namespace NPDashboard\Repositories;

use NPCore\AppCapsule;
use Illuminate\Database\Eloquent\Model;
use NPDashboard\Repositories\Repository;
use NPDashboard\Models\FakeXrulegroup;
use \Exception;

class FakeXrulegroupRepository extends Repository
{
    public function getModel()
    {
        return (new FakeXrulegroup());
    }

    public function setNewFakeRulegroupRelation($server_id, $fake_id){
        
        try {
            $created = $this->getModel()->create([
                'id_rulegroup' => $server_id,
                'fake_id' => $fake_id
                ]);
            return $created;
        } catch (\Throwable $th) {
            return die(print_r('<h1>Atenção, houve um erro! Alias já existe ou o banco retornou com um erro! Volte e atualize a página por favor para checar.</h1>'));
        }

    }

    public function getFakeAliasFromRulegroup($id)
    {
        $qry = "SELECT al.fake_id, a.original_name, a.display_name FROM rules_rulegroup rr
                LEFT JOIN rules_rulegroup_x_fake_alias al ON rr.id_rulegroup = al.id_rulegroup
                LEFT JOIN fake_alias_info as a ON a.id = al.fake_id
                WHERE rr.id_rulegroup = $id";

        $db_raw = AppCapsule::database()->connection('bd_alias');
        return $db_raw->select($qry);
    }

    public function removeFakeAliasRuleGroup($rulegroupId, $aliasId)
    {
        $this->getModel()->where([['id_rulegroup', '=', $rulegroupId], ['fake_id', '=', $aliasId]])->delete();
    }

    // New Version creation ------------->

    public function getFakeAliasRuleGroupsConcat()
    {
        try {
            $db_raw = AppCapsule::database()->connection('bd_alias');
            $qry = "SELECT
            server_x_fake_alias.server_id            AS 'alias_id',
            fake_alias_info.permission_level    AS 'rules_type',
            fake_alias_info.display_name  AS 'display_name',
            fake_alias_info.others        AS 'others',
            fake_alias_info.country         AS 'country',
            fake_alias_info.country_fullname     AS 'country_fullname',
            (SELECT DISTINCT GROUP_CONCAT(rules.id_rulegroup SEPARATOR ',')
            FROM rules_rulegroup_x_fake_alias rules
            WHERE rules.fake_id = fake_alias_info.id) AS rule_group_list
            FROM fake_alias_info
            INNER JOIN server_x_fake_alias ON fake_alias_info.id = server_x_fake_alias.fake_id
            INNER JOIN servers ss ON ss.id = server_x_fake_alias.server_id
            WHERE ss.type = 'FINAL'";
            

            return $db_raw->select($qry);
        }catch (\Throwable $th) {
            return $this->return_json(500,'INTERNAL_SERVER_ERROR', 'Something went wrong with SQL!');
        }

    }
}