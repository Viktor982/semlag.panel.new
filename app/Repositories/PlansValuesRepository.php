<?php

namespace NPDashboard\Repositories;

use NPDashboard\Models\PlanValue;
use NPDashboard\Models\Plan;
use NPDashboard\Repositories\Repository;
use NPDashboard\Payments\VendorRecurringPlanGateways as PlanUpdater;

class PlansValuesRepository extends Repository
{
    /**
     * @return PlanValue
     */

    const CURRENCY_BRL = 1;
    const CURRENCY_USD = 2;

    public function getModel()
    {
        return (new PlanValue());
    }

    public function getModelPlan()
    {
        return (new Plan());
    }

    /**
     * @param array $options
     * @param $idPlan
     */
    public function update(array $options, $idPlan)
    {

        $this->getModel()->create([
            'currency_id' => self::CURRENCY_BRL,
            'value' => $options['valueBrl'],
            'plano_id' => $idPlan,
            'country_id' => $options['idCountry']
        ]);

        $this->getModel()->create([
            'currency_id' => self::CURRENCY_USD,
            'value' => $options['valueUsd'],
            'plano_id' => $idPlan,
            'country_id' => $options['idCountry']
        ]);
    }

    /**
     * @param $idPlan
     * @param $idCountry
     * @param $idCurrency
     */
    public function deleteByCountryAndCurrency($idPlan, $idCountry, $idCurrency)
    {
        $this->getModel()->where([
            'plano_id' => $idPlan,
            'currency_id' => $idCurrency,
            'country_id' => $idCountry
        ])->delete();
    }
}
