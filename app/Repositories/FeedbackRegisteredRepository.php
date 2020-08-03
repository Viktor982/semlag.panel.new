<?php

namespace NPDashboard\Repositories;
use Illuminate\Database\Eloquent\Model;
use NPDashboard\Repositories\Repository;
use NPDashboard\Models\FeedbackRegistered;
use Datetime;

class FeedbackRegisteredRepository extends Repository
{
    /**
     * @return FeedbackRegistered
     */

    public function getModel()
    {
        return (new FeedbackRegistered());
    }

    public function getEmailAlpha()
    {
        return $this->getModel()
                    ->select('email', 'last_updated_days')->paginate(20);
    }

    public function registerNewClient($email)
    {
        $date_now = new Datetime();
        $date_now = $date_now->format('Y-m-d');

        return $this->getModel()->create([
            'email' => $email,
            'last_updated_days' => $date_now
        ]);
    }
}