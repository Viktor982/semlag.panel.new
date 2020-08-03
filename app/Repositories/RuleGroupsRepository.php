<?php


namespace NPDashboard\Repositories;


use Illuminate\Database\Eloquent\Model;
use NPCore\AppCapsule;
use NPDashboard\Models\Infrastructure\RuleGroup;

class RuleGroupsRepository extends Repository
{
    public function getModel()
    {
        return (new RuleGroup());
    }

    /**
     * @return mixed
     */
    public function namesById()
    {
        $manager = AppCapsule::database();
        return $manager->table('rulegroup')
            ->select('id', 'name')
            ->orderBy('id')
            ->get()
            ->pluck('name', 'id');
    }

    /**
     * @return array
     */
    public function ruleIdByProcess()
    {
        $result = [];
        $all = $this->getModel()
            ->with('processes')
            ->get();
        foreach($all as $rule) {
            foreach($rule->processes as $process) {
                $result[$process->name] = $rule->id;
            }
        }
        return $result;
    }

}