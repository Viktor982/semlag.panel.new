<?php

namespace NPDashboard\Http\ACL;

use NPCore\Http\ACL\RoleValidation;
use NPDashboard\ACL\Models\Role;

class UserViewIpnLogsRoleValidation extends RoleValidation
{
    /**
     * @return array
     */
    public function need()
    {
        return $role = [
            'payments_ipn_logs'
        ];
    }
}