<?php

namespace NPDashboard\ViewHelpers;


class EmailsViewHelper
{
    /**
     * @var \NPCore\Email\Drivers\Contracts\EmailDriverContract
     */
    private $driver;

    /**
     * EmailsViewHelper constructor.
     */
    public function __construct()
    {
        $this->driver = \NPCore\AppCapsule::mailer();
    }

    /**
     * @return mixed
     */
    public function today()
    {
        return $this->driver->todayFiredEmails();
    }

    /**
     * @return mixed
     */
    public function lastMonth()
    {
        return $this->driver->monthlyFiredEmails();
    }
}