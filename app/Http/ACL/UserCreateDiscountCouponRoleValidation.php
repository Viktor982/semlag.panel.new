<?php

namespace NPDashboard\Http\ACL;

use NPCore\Http\ACL\RoleValidation;

class UserCreateDiscountCouponRoleValidation
{
    /**
     * @return array
     */
    public function need()
    {
        return $role = [
            'payments_discounts_create'
        ];
    }
}