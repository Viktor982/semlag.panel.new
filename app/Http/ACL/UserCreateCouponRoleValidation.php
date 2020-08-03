<?php

namespace NPDashboard\Http\ACL;

use NPCore\Http\ACL\RoleValidation;

class UserCreateCouponRoleValidation extends RoleValidation
{
    /**.
     * @return array
     */
    public function need()
    {
        return $role = [
            'payments_coupons_create'
        ];
    }
}