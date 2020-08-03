<?php

namespace NPDashboard\Http\ACL;

use NPCore\Http\ACL\RoleValidation;

class UserListCouponRoleValidation extends RoleValidation
{
    /**
     * @return array
     */
    public function atLeast()
    {
        return $role = [
            'payments_coupons_list',
            'customers_coupons'
        ];
    }

}