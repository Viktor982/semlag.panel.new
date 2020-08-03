<?php


namespace NPDashboard\Http\ACL;


use NPCore\Http\ACL\RoleValidation;

class UserAdministrativeRoleValidation extends RoleValidation
{
    /**
     * @return array
     */
    public function need()
    {
        return $role = [
            'administrative'
        ];
    }

}