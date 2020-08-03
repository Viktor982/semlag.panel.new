<?php

namespace NPDashboard\Http\ACL;

use NPCore\Http\ACL\RoleValidation;

class UserListAffiliatesRoleValidation extends RoleValidation
{
    /**
     * @return array
     */
    public function need()
    {
        return $role = [
            'affiliates_list'
        ];
    }
}