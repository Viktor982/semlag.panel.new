<?php

namespace NPDashboard\Repositories;
use Illuminate\Database\Eloquent\Model;
use NPDashboard\Repositories\Repository;
use NPDashboard\Models\Feedback;
use Datetime;

class FeedbackRepository extends Repository
{
    /**
     * @return Feedback
     */

    public function getModel()
    {
        return (new Feedback());
    }

    public function getFeedbacks($pages = 30)
    {
        return $this->getModel()->select('ip', 'email', 'name_game', 'server_np', 'ping_with_np', 'ping_without_np', 'version_windows', 'description', 'created_at')->paginate((int)$pages);
    }

}