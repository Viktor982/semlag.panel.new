<?php

namespace NPDashboard\Http\ACL;

Use NPCore\Http\ACL\RoleValidation;

class UserEditDiscountCouponRoleValidation extends RoleValidation
{
    /**
     * @return array
     */
    public function need()
    {
        return $role = [
          'payments_discounts_edit'
        ];
    }
}