<?php

namespace NPDashboard\Http\ACL;

use NPCore\Http\ACL\RoleValidation;

class UserListSalesRoleValidation extends RoleValidation
{
    /**
     * @return array
     */
    public function need()
    {
        return $role =[
            'payments_sales_list'
        ];
    }
}