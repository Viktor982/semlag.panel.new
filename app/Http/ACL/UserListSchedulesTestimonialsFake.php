<?php

namespace NPDashboard\Http\ACL;

use NPCore\Http\ACL\RoleValidation;

class UserListSchedulesTestimonialsFake extends RoleValidation
{
    /**
     * @return array
     */
    public function need()
    {
        return $role = [
          'testimonials_fake_schedule'
        ];
    }
}