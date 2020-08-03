<?php

namespace NPDashboard\Http\ACL;

use NPCore\Http\ACL\RoleValidation;

class UserSendEmailRoleValidation extends RoleValidation
{
    public function need()
    {
        return $role = [
            'customers_contact'
        ];
    }
}