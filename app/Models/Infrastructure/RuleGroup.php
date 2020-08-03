<?php


namespace NPDashboard\Models\Infrastructure;

use NPDashboard\Models\Model;

class RuleGroup extends Model
{
    protected $table = 'rulegroup';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function processes()
    {
        return $this->belongsToMany(Process::class, 'rulegroup_has_process', 'rulegroup_id', 'process_id');
    }
}