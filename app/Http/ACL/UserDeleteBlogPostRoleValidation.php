<?php


namespace NPDashboard\Http\ACL;


use NPCore\Http\ACL\RoleValidation;

class UserDeleteBlogPostRoleValidation extends RoleValidation
{
    /**
     * @return array
     */
    public function need()
    {
        return $role = [
            'site_blog_posts_delete'
        ];
    }
}