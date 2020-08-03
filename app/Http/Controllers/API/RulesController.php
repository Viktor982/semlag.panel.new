<?php

namespace NPDashboard\Http\Controllers\API;

use NPDashboard\Http\Controllers\Controller;
use NPDashboard\Repositories\RuleRulegroupRepository;
use NPDashboard\Repositories\FakeXrulegroupRepository;

class RulesController extends Controller
{
    public function aliasRulegroup(RuleRulegroupRepository $repository)
    {
        $id = $this->request->all()['id'];
        $alias = $repository->getAliasFromRulegroup($id);

        return $alias;
    }
    
    public function fakeAliasRulegroup(FakeXrulegroupRepository $repository)
    {
        $id = $this->request->all()['id'];
        $alias = $repository->getFakeAliasFromRulegroup($id);

        return $alias;
    }
}