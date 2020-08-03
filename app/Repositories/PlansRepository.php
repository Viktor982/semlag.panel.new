<?php

namespace NPDashboard\Repositories;

use NPDashboard\Models\Plan;
use NPDashboard\Repositories\Repository;
use Illuminate\Database\Eloquent\Model;
use NPDashboard\Payments\VendorRecurringPlanGateways as PlanUpdater;

class PlansRepository extends Repository
{
    /**
     * @return Plan
     */

    public function getModel()
    {
       return (new Plan());
    }

    /**
     * @return mixed
     */
    public function plansTable()
    {
        return $this->getModel()
           ->select('id', 'nome', 'descricao', 'status', 'frequency', 'period', 'active')
           ->paginate(10);
    }

    /**
     * @return mixed
     */
    public function activePlans()
    {
        return $this->getModel()
            ->select('id', 'nome', 'descricao', 'status', 'frequency', 'period', 'active')
            ->where('active', 1)
            ->get();
    }

    public function listPlans()
    {
        return $this->getModel()
            ->select('id', 'nome', 'descricao', 'status', 'frequency', 'period', 'active')
            ->get();
    }

    /**
     * @param array $options
     */
    public function create(array $options)
    {
        $plan = $this->getModel()->create([
            'nome' => $options['nome'],
            'descricao' => $options['descricao'],
            'status' => $options['active'],
            'special' => $options['special'],
            'frequency' => $options['frequency']
        ]);

        $plan->planValues()->create([
            'currency_id' => 1,
            'value' => $options['value'][1],
        ]);

        $plan->planValues()->create([
            'currency_id' => 2,
            'value' => $options['value'][2],
        ]);

        $plan->npCoins()->create([
            'plan_id' => $plan->id,
            'price' => $options['npcoin']
        ]);
        $this->updateRecurringPlanOnGateways($plan);
    }

    /**
     * @param array $options
     * @param $id
     */
    public function update(array $options, $id)
    {
        $plan = $this->getModel()->find($id);
        $plan->update([
            'nome' => $options['nome'],
            'status' => $options['active'],
            'special' => $options['special'],
            'frequency' => $options['frequency'],
            'default' => $options['default']
        ]);

        $this->getModel()->find($id)->planValues()
            ->where('currency_id', '1')
            ->update([
                'value' => $options['value'][1],
        ]);

        $this->getModel()->find($id)->planValues()
            ->where('currency_id', '2')
            ->update([
            'value' => $options['value'][2],
        ]);

        $this->getModel()->find($id)->npCoins()
            ->update([
            'price' => $options['npcoin']
        ]);
        $this->updateRecurringPlanOnGateways($plan);
    }

    private function updateRecurringPlanOnGateways(Plan $plan)
    {
       PlanUpdater::updateAll($plan);
    }
}