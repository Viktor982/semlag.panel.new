<?php


namespace NPDashboard\Http\Controllers;

use NPDashboard\Http\ACL\UserCreateCouponRoleValidation;
use NPDashboard\Http\ACL\UserEditCouponRoleValidation;
use NPDashboard\Http\ACL\UserListCouponRoleValidation;
use NPDashboard\Models\Plan;
use NPDashboard\Repositories\CouponsRepository;
use NPDashboard\Repositories\CupomInfoRepository;
use NPDashboard\Repositories\CustomersRepository;
use NPDashboard\Repositories\PlansRepository;
use NPDashboard\Services\CouponService;
use NPDashboard\Services\IpHelperService;
use NPDashboard\Http\Controllers\Controller;

class CouponsController extends Controller
{
    /**
     * @param CouponsRepository $couponsRepository
     * @param UserListCouponRoleValidation $role
     * @return \Illuminate\Contracts\View\View
     */
    public function all(CouponsRepository $couponsRepository, UserListCouponRoleValidation $role)
    {
        $coupons_info = $couponsRepository->coupounInfoTables();
        return view('pages.coupons.all', ['coupons' => $coupons_info]);
    }

    /**
     * @param CouponsRepository $couponsRepository
     * @param UserListCouponRoleValidation $role
     * @return \Illuminate\Contracts\View\View
     */
    public function searchUserCoupons(CouponsRepository $couponsRepository, UserListCouponRoleValidation $role)
    {
        $id = $this->request->all()['id'];
        $coupons = $couponsRepository->findByUser($id);
        return view('pages.coupons.all', ['coupons' => $coupons]);
    }

    /***
     * @param UserListCouponRoleValidation $role
     * @return \NPCore\Http\Redirect
     */
    public function search(UserListCouponRoleValidation $role)
    {
        $args = $this->request->all();
        if(empty($args["value"])){
            return redirect('coupons.all');
        }else{
            $args["value"] = base64_encode($args['value']);
            return redirect('coupons.search-result', ['method' => $args["method"], 'value' => $args['value']]);
        }
    }

    /**
     * @param CouponsRepository $repository
     * @param UserListCouponRoleValidation $role
     * @return \Illuminate\Contracts\View\View
     */
    public function searchResult(CouponsRepository $repository,  UserListCouponRoleValidation $role)
    {
        $args     = $this->request->all();
        $value    = base64_decode($args['value']);
        $coupons  = $repository->search($args['method'], $value);
        return view('pages.coupons.all', ['coupons' => $coupons]);
    }

    /**
     * @param PlansRepository $plansRepository
     * @param UserCreateCouponRoleValidation $role
     * @return \Illuminate\Contracts\View\View
     */
    public function generateCoupons(PlansRepository $plansRepository, UserCreateCouponRoleValidation $role)
    {
        $plans = $plansRepository->findAll();
        return view('pages.coupons.generate', ['plans' => $plans]);
    }

    /**
     * @param PlansRepository $plansRepository
     * @param CustomersRepository $customersRepository
     * @param CouponService $couponService
     * @param UserCreateCouponRoleValidation $role
     * @return \Illuminate\Contracts\View\View
     */
    public function generatedCoupons(PlansRepository $plansRepository, CustomersRepository $customersRepository, CouponService $couponService, UserCreateCouponRoleValidation $role, CupomInfoRepository $cupom_info, IpHelperService $ip_service)
    {
        $args = $this->request->all();
        $user_ip = $ip_service->get_ip_address();
        $user_id = authenticated()->id;
        $customer = $customersRepository->findByEmail($args['customer']);
        $plan = $plansRepository->find($args['plan']);
        $coupons = $couponService->generateCoupon($plan, $args['amount'], $customer->id);
        
        //multiple insert to prevent multiple queries
        $_coupons = [];
        foreach ($coupons as $key => $value) {
            array_push($_coupons,[
                'reason'     => $args['reason'],
                'destiny'    => $args['destiny'],
                'coupon_id'  => $value->id,
                'ad_user_id' => $user_id,
                'ad_user_ip' => $user_ip
            ]);
        }
        $cupom_info->getModel()->insert($_coupons);

        return view('pages.coupons.generated', ['coupons' => $coupons]);
    }

    /**
     * @param CouponsRepository $couponsRepository
     * @param CouponService $couponService
     * @param UserEditCouponRoleValidation $role
     * @return \NPCore\Http\Redirect
     */
    public function disableCoupon(CouponsRepository $couponsRepository, CouponService $couponService, UserEditCouponRoleValidation $role)
    {
        $id = $this->request->all()['id'];
        $coupon = $couponsRepository->find($id);
        $couponService->updateStatus($coupon, true);

        np_log('updateStatus' , [
            'value_type' => "Status para Inativo",
            'type' => "Cupom",
            'id' => $coupon->id
        ]);

        return redirect('coupons.all');
    }

    /**
     * @param CouponsRepository $couponsRepository
     * @param CouponService $couponService
     * @param UserEditCouponRoleValidation $role
     * @return \NPCore\Http\Redirect
     */
    public function enableCoupon(CouponsRepository $couponsRepository, CouponService $couponService, UserEditCouponRoleValidation $role)
    {
        $id = $this->request->all()['id'];
        $coupon = $couponsRepository->find($id);
        $couponService->updateStatus($coupon, false);

        np_log('updateStatus' , [
            'value_type' => "Status para Ativo",
            'type' => "Cupom",
            'id' => $coupon->id
        ]);

        return redirect('coupons.all');
    }
}