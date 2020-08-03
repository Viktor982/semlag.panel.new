<?php


namespace NPDashboard\Charts;

use NPCore\AppCapsule;
use Illuminate\Database\Eloquent\Model;
use NPDashboard\Charts\AbstractChart;
use NPDashboard\Models\RuleGroup;

class RulesRepo extends AbstractChart
{
    public function getModel(RuleGroup $model)
    {
        return (new RuleGroup());
    }
}