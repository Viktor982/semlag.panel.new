<?php

namespace NPDashboard\Repositories;

use NPDashboard\Models\Testimonial;
use Illuminate\Database\Eloquent\Model;
use NPDashboard\Models\ScheduleTestimonial;
use NPDashboard\Repositories\Repository;

class TestimonialsRepository extends Repository
{
    /**
     * @return Testimonial
     */
    public function getModel()
    {
        return (new Testimonial());
    }

    /**
     * @return ScheduleTestimonial
     */
    public function getSchedule()
    {
        return (new ScheduleTestimonial());
    }

    /**
     * @param $status
     * @param int $paginate
     * @return mixed
     */
    public function findByStatus($status, $paginate = 10)
    {
        return $this->getModel()
            ->select('id', 'user_id', 'game_id', 'title', 'body', 'approved', 'lang', 'created_at', 'updated_at', 'landing')
            ->where('approved', $status)
            ->paginate($paginate);
    }

    /**
     * @return mixed
     */
    public function testimonialsTable()
    {
        return $this->getModel()
            ->select('id', 'user_id', 'game_id', 'title', 'body', 'approved', 'lang', 'created_at', 'updated_at', 'landing')
            ->paginate(10);
    }

    /**
     * @return mixed
     */
    public function pendingTestimonialsTable()
    {
        return $this->findByStatus(1, 10);
    }

    /**
     * @return mixed
     */
    public function approvedTestimonialsTable()
    {
        return $this->findByStatus(2, 10);
    }

    /**
     * @return mixed
     */
    public function disapprovedTestimonialsTable()
    {
        return $this->findByStatus(3, 10);
    }

    /**
     * @return int
     */
    public function pendingApproveCount()
    {
        return $this->getModel()
            ->select('approved', 'id')
            ->where('approved', 1)
            ->count();
    }

    /**
     * @param $day
     * @param $month
     * @param $year
     * @return int
     */
    public function createdTestimonialsCountByDay($day = null, $month = null, $year = null)
    {
        if ($day === null) {
            $day = date("d");
            $month = date("m");
            $year = date("Y");
        }
        return $this->getModel()
            ->select('id', 'created_at')
            ->where('created_at', '>=', "{$year}-{$month}-{$day} 00:00:00")
            ->where('created_at', '<=', "{$year}-{$month}-{$day} 23:59:59")
            ->count();
    }

    /**
     * @param array $options
     */
    public function create(array $options)
    {
        $this->getModel()->create([
            'user_id' => $options['customer_id'],
            'title' => $options['customer_name'],
            'game_id' => $options['game'],
            'body' => $options['testimonial'],
            'approved' => '2',
            'lang' => $options['language']
        ]);
    }

    /**
     * @param array $options
     */
    public function createSchedule(array $options)
    {
        $this->getSchedule()->create([
            'customer_id' => $options['customer_id'],
            'title' => $options['customer_name'],
            'text' => $options['testimonial'],
            'language' => $options['language'],
            'schedule_for' => $options['schedule_for'],
            'converted' => '0'
        ]);
    }

    /**
     * @return mixed
     */
    public function schedulesTable()
    {
        return $this->getSchedule()
            ->select('id', 'customer_id', 'title', 'text', 'language', 'schedule_for', 'converted')
            ->paginate(10);
    }

    /**
     * @param $method
     * @param $value
     * @return mixed
     */
    public function search($method, $value)
    {
        switch($method){
            case 'game':
                return $this->findByGame($value);
                break;

            case 'title':
                return $this->findByTitle($value);
                break;

            case 'customer':
                return $this->findByCustomer($value);
                break;

            default:
                return $this->testimonialsTable();
                break;
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findByGame($id)
    {
        return $this->getModel()
            ->where('game_id', $id)
            ->paginate(10);
    }

    /**
     * @param $title
     * @return mixed
     */
    public function findByTitle($title)
    {
        return $this->getModel()
            ->where('title', $title)
            ->paginate(10);
    }

    /**
     * @param $email
     * @return mixed
     */
    public function findByCustomer($email)
    {
        $repository = (new CustomersRepository());
        $customer = $repository->findByEmail($email);

        return $this->getModel()
            ->where('user_id', $customer->id)
            ->paginate(10);
    }

}