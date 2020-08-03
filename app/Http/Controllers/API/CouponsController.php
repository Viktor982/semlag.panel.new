<?php


namespace NPDashboard\Http\Controllers\API;

use NPDashboard\Http\ACL\UserListCouponRoleValidation;
use NPDashboard\Http\Controllers\Controller;
use NPDashboard\Repositories\CouponsRepository;
use NPDashboard\Repositories\CustomersRepository;
use NPDashboard\Services\CouponService;

class CouponsController extends Controller
{
    /**
     * @param CouponsRepository $couponsRepository
     * @param CustomersRepository $customersRepository
     * @return array
     */
    public function getUserCoupons(CouponsRepository $couponsRepository, CustomersRepository $customersRepository)
    {
        $id = $this->request->all()['id'];
        $coupons = $couponsRepository->findByUserApi($id)
            ->map(function ($value) {
                $arr =$value->getAttributes();
                $arr['origin'] =  ($arr['venda_id']) ? 'Venda #'.$arr['venda_id']:'Criado Por um Admin' ;
                $arr['plan'] = plan($arr['plano_id']);
                $arr['coupon'] = coupon($arr['cupom']);
                $arr['disabled'] = ($arr['disabled']) ? "Desativado":"Habilitado";
                $arr['created_at'] = brDate($arr['data_cadastro']);
                $arr['status'] = ($arr['user_activated']) ? 'Cupom Utilizado' : 'Livre';
                return $arr;
            });
        return ['data' => $coupons];
    }

    /**
     * @param CouponsRepository $couponsRepository
     * @param CouponService $couponService
     * @return array
     */
    public function disableCoupon(CouponsRepository $couponsRepository, CouponService $couponService)
    {
        $id = $this->request->all()['id'];
        $coupon = $couponsRepository->find($id);
        $couponService->updateStatus($coupon, true);

        np_log('updateStatus' , [
            'value_type' => "Status para Inativo",
            'type' => "Cupom",
            'id' => $coupon->id
        ]);

        return [
            'success' => true
        ];
    }


}