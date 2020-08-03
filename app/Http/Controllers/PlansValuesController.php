<?php

namespace NPDashboard\Http\Controllers;

use NPDashboard\Http\ACL\UserCreatePlanRoleValidation;
use NPDashboard\Http\ACL\UserEditPlanRoleValidation;
use NPDashboard\Http\ACL\UserListPlansRoleValidation;
use NPDashboard\Repositories\PlansRepository;
use NPDashboard\Repositories\PlansValuesRepository;
use NPDashboard\Repositories\CountryRepository;
use NPDashboard\Http\Controllers\Controller;

class PlansValuesController extends Controller
{
    /**
     * @param PlansRepository $repository
     * @param UserListPlansRoleValidation $role
     * @return \Illuminate\Contracts\View\View
     */
    public function all(PlansRepository $repository, UserListPlansRoleValidation $role)
    {
        $plans = $repository->plansTable();
        return view('pages.plans-values.all', ['plans' => $plans]);
    }

    /**
     * @param PlansRepository $repository
     * @param UserEditPlanRoleValidation $role
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(PlansRepository $repository, UserEditPlanRoleValidation $role, CountryRepository $countryRepository)
    {
        $id = $this->request->all()['id'];
        $plan = $repository->find($id);
        $countries = $countryRepository->listCountries();
        return view('pages.plans-values.edit', ['plan' => $plan, 'countries' => $countries]);
    }

    /**
     * @param PlansValuesRepository $repository
     * @param UserEditPlanRoleValidation $role
     * @return \NPCore\Http\Redirect
     */
    public function update(PlansValuesRepository $repository, UserEditPlanRoleValidation $role)
    {
        try {
            $args = $this->request->except(['id']);
            $id = $this->request->only(['id'])['id'];
            $repository->update($args, $id);

            np_log('edit', [
                'type' => "Plans Values",
                'id' => $id
            ]);

            return json_encode(['status' => true, 'msg' => 'success']);

        } catch(\Exception $e) {
            return json_encode(['status' => false, 'msg' => 'success']);
        }

    }

    /**
     * @param PlansValuesRepository $repository
     * @param UserCreatePlanRoleValidation $role
     * @return \NPCore\Http\Redirect
     */
    public function store(PlansValuesRepository $repository, UserCreatePlanRoleValidation $role)
    {
        /**
         * TODO
         */
    }

    public function destroy(PlansValuesRepository $repository, UserCreatePlanRoleValidation $role)
    {
        $idPlan = $this->request->only(['id'])['id'];
        $idCountry = $this->request->only(['idCountry'])['idCountry'] ?? null;
        $idCurrency = $this->request->only(['idCurrency'])['idCurrency'] ?? null;

        if (empty($idPlan) || empty($idCurrency) || empty($idCountry)) {
            json_encode(['status' => false, 'msg' => 'success']);
        }

        $repository->deleteByCountryAndCurrency($idPlan, $idCountry, $idCurrency);

        np_log('delete', [
            'type' => "Plans Values",
            'id' => $idPlan,
            'idCountry' => $idCountry,
            'idCurrency' => $idCurrency,
        ]);

        return json_encode(['status' => true, 'msg' => 'success']);
    }
}
