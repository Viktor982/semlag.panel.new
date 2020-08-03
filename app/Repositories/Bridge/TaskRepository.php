<?php

namespace NPDashboard\Repositories\Bridge;

use Illuminate\Database\Eloquent\Model;
use NPDashboard\Repositories\Repository;
use NPDashboard\Models\Bridge\BridgeTask;

class TaskRepository extends Repository
{
    public function getModel()
    {
        return (new BridgeTask());
    }

    public function registerNewTask(array $options)
    {
        $created = $this->getModel()->create(['task' => $options['task']]);
        return $created;
    }

    public function get_tasks()
    {
        return $this->getModel()->all();
    }
}