<?php

namespace NPDashboard\Models;

use Illuminate\Support\Collection;
use NPDashboard\Models\Model;
use NPDashboard\ACL\Models\Group;
use NPDashboard\ACL\Models\Role;

class User extends Model
{
    protected $table = 'ad_user';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function groups()
    {
        return $this->belongsToMany(Group::class, 'ad_group_users');
    }

    /**
     * @return Collection
     */
    public function groupsRoles()
    {
        $return = new Collection();
        $groupsRoles = $this->groups->map(function ($g) {
            return $g->roles();
        });
        foreach ($groupsRoles as $group) {
            foreach ($group as $role) {
                $return->push($role);
            }
        }
        return $return->unique();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function userRoles()
    {
        return $this->belongsToMany(Role::class, 'ad_user_roles');
    }

    /**
     * @return Collection
     */
    public function selfRoles()
    {
        return $this->userRoles->map( function ($r) {
            return $r->role;
        });
    }

    /**
     * @return array
     */
    public function roles()
    {
        return collect([])
            ->merge($this->selfRoles())
            ->merge($this->groupsRoles())
            ->unique()
            ->toArray();
    }
}