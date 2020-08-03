<?php

namespace NPDashboard\Http\Controllers;

use NPDashboard\Http\ACL\UserCreateDiscountCouponRoleValidation;
use NPDashboard\Http\ACL\UserEditDiscountCouponRoleValidation;
use NPDashboard\Http\ACL\UserListDiscountCouponRoleValidation;
use NPDashboard\Repositories\DiscountRepository;
use NPDashboard\Repositories\PlansRepository;
use NPDashboard\Services\DiscountService;
use NPDashboard\Http\Controllers\Controller;

class DiscountsController extends Controller
{
    /**
     * @param DiscountRepository $repository
     * @param PlansRepository $plansRepo
     * @param UserListDiscountCouponRoleValidation $role
     * @return \Illuminate\Contracts\View\View
     */
    public function all(DiscountRepository $repository, PlansRepository $plansRepo, UserListDiscountCouponRoleValidation $role)
    {
        $discounts = $repository->discountsTable();
        $plans = $plansRepo->activePlans();

        return view('pages.discounts.all', ['discounts' => $discounts, 'plans' => $plans]);
    }

    /**
     * @param UserEditDiscountCouponRoleValidation $role
     * @param DiscountRepository $repository
     * @param PlansRepository $plansRepo
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(UserEditDiscountCouponRoleValidation $role, DiscountRepository $repository, PlansRepository $plansRepo)
    {
        $id = $this->request->all()['id'];
        $discount = $repository->find($id);
        $plans = $plansRepo->activePlans();
        $affected_plans = explode(',', $discount->plans_affected);
        return view('pages.discounts.edit', ['discount' => $discount, 'plans' => $plans, 'affected_plans' => $affected_plans]);
    }

    /**
     * @param DiscountRepository $repository
     * @param UserEditDiscountCouponRoleValidation $role
     * @return \NPCore\Http\Redirect
     */
    public function update(DiscountRepository $repository, UserEditDiscountCouponRoleValidation $role)
    {
        $args = $this->request->all();
        $id = $args['id'];
        $plans = implode(',', $args['plans_affected']);
        $coupon = $repository->find($id);
        $date = (new \Carbon\Carbon($args['expire_date']))->format("Y-m-d H:i:s");

        $coupon->update([
                'name' => $args['name'],
                'plans_affected' => $plans,
                'percentage' => $args['percentage'],
                'code' => $args['code'],
                'expire_date' => $date
            ]
        );

        np_log('edit', [
            'type' => "Cupom de Desconto",
            'id' => $id
        ]);

        return redirect('discount.all');
    }

    /**
     * @param DiscountRepository $repository
     * @param UserEditDiscountCouponRoleValidation $role
     * @return \NPCore\Http\Redirect
     */
    public function delete(DiscountRepository $repository, UserEditDiscountCouponRoleValidation $role)
    {
        $id = $this->request->all()['id'];
        $coupon = $repository->find($id);

        $coupon->delete();

        np_log('delete', [
            'type' => "Cupom de Desconto",
            'id' => $id
        ]);

        return redirect('discount.all');
    }

    /**
     * @param DiscountService $service
     * @param UserCreateDiscountCouponRoleValidation $role
     * @return \NPCore\Http\Redirect
     */
    public function store(DiscountService $service, UserCreateDiscountCouponRoleValidation $role)
    {
        $args = $this->request->all();
        if(  $args['name'] == null
          || $args['code'] == null
          || $args['name'] == ''
          || $args['code'] == '')
          {
            return return_json(500,'INTERNAL_SERVER_ERROR', 'Insira os valores corretamente por favor!');
          }

        $discount = $service->create($args);
        np_log('store', [
            'type' => "Cupom de Desconto",
            'id' => $discount->id
        ]);
        return redirect('discount.all');
    }
}