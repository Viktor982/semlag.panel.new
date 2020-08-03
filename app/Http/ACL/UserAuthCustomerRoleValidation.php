<?php

namespace NPDashboard\Http\ACL;

use NPCore\Http\ACL\RoleValidation;

class UserAuthCustomerRoleValidation extends RoleValidation
{
    /**
     * @return array
     */
    public function need()
    {
        return $role = [
            'customers_auth_login'
        ];
    }
}