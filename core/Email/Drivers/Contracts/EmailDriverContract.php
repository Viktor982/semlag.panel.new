<?php

namespace NPCore\Email\Drivers\Contracts;

interface EmailDriverContract
{
    /**
     * @param $to
     * @param $from
     * @param $subject
     * @param $text
     * @param null $domain
     * @return mixed
     */
    public function send($to, $from, $subject, $text, $domain = null);
    public function monthlyFiredEmails();
    public function todayFiredEmails();
}