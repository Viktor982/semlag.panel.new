<?php

namespace NPDashboard\Repositories;

use Illuminate\Database\Eloquent\Model;
use NPDashboard\Models\Rule;

class RulesRepository extends Repository
{
    /**
     * @return Rule
     */
    public function getModel()
    {
        return (new Rule());
    }

    /**
     * @return mixed
     */
    public function getLastTenRules()
    {
        return $this->getModel()->orderBy('id', 'DESC')->take(5)->get();
    }

    /**
     * @param $version
     * @return mixed
     */
    public function getVersion($version)
    {
        return $this->getModel()->where('rule_version', $version)->first();
    }

    /**
     * @param $version
     * @return bool
     */
    public function updateRuleFromVersion($version)
    {
        $rule = $this->getVersion($version);
        if(!$rule)
            return false;
        $rule->touch();
        return true;
    }

    public function insertNewRule($path, $version)
    {
        return $this->getModel()->create([
           'rule_path' => $path,
           'rule_version' => $version
        ]);
    }
}
