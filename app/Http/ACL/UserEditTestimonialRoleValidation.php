<?php

namespace NPDashboard\Http\ACL;

use NPCore\Http\ACL\RoleValidation;

class UserEditTestimonialRoleValidation extends RoleValidation
{
    /**
     * @return array
     */
    public function need()
    {
        return $role = [
            'testimonials_edit'
        ];
    }
}