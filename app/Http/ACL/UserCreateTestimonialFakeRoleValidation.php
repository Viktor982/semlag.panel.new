<?php

namespace NPDashboard\Http\ACL;

class UserCreateTestimonialFakeRoleValidation
{
    /**
     * @return array
     */
    public function need()
    {
        return $role = [
            'testimonials_fake_create'
        ];
    }
}