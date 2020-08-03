<?php


namespace NPDashboard\ACL\Models;

use NPDashboard\Models\Model;

class Group extends Model
{
    /**
     * @var string
     */
    protected $table = 'ad_groups';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function groupRoles()
    {
        return $this->belongsToMany(Role::class, 'ad_group_roles');
    }

    /**
     * @return array
     */
    public function roles()
    {
        return $this->groupRoles()
            ->get()
            ->map(function ($r) {
                return $r->role;
            })
            ->toArray();
    }
}