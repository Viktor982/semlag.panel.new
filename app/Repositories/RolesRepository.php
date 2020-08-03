<?php

namespace NPDashboard\Repositories;

use Illuminate\Database\Eloquent\Model;
use NPDashboard\ACL\Models\Role;

class RolesRepository extends Repository
{
    /**
     * @return Role
     */
    public function getModel()
    {
        return (new Role());
    }

    /**
     * @return mixed
     */
    public function rolesTable()
    {
        return $this->getModel()
            ->select('id', 'role', 'description', 'group')
            ->get();
    }
}