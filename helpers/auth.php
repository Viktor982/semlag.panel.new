<?php

if(! function_exists('authenticated')) {
    /**
     * @param bool $fresh
     * @return \NPDashboard\Models\User|null
     */
    function authenticated($fresh = true)
    {
        $user = \Session::get('user');

        if(! $user)
            return null;

        return ($fresh) ? $user->fresh() : $user;
    }
}

if(! function_exists('can')) {
    /**
     * @return bool
     * @throws Exception
     */
    function can()
    {
        $amount = func_num_args();
        if(! $amount || $amount > 2)
            throw new \Exception("Helper can, must be called as can(\$user,'role_name') or can('role_name') for check role in authenticated user.");

        if($amount == 1){
            $role = func_get_arg(0);
            $roles = container()['roles'];
            return in_array($role, $roles);
        }

        $role = func_get_arg(1);
        $user = func_get_arg(0);
        return (in_array($role, $user->roles()));
    }
}

if(! function_exists('role')) {
    /**
     * @param $roles
     * @return bool
     */
    function role($roles)
    {
        if(is_array($roles)) {
            foreach ($roles as $role){
                if(can($role))
                    return true;
            }
        }
        return can($roles);
    }
}