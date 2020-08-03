<?php

namespace NPDashboard\Http\ACL;

use NPCore\Http\ACL\RoleValidation;

class UserEditCouponRoleValidation extends RoleValidation
{
    /**
     * @return array
     */
    public function need()
    {
        return $role = [
            'payments_coupons_edit'
        ];
    }
}