<?php

namespace NPDashboard\Repositories;

use Illuminate\Database\Eloquent\Model;
use NPDashboard\ACL\Models\Group;

class GroupsRepository extends Repository
{
    /**
     * @return Group
     */
    public function getModel()
    {
        return (new Group());
    }

    /**
     * @return mixed
     */
    public function groupsTable()
    {
        return $this->getModel()
            ->select('id', 'name')->get();
    }
}