<?php

if(! function_exists('email')) {
    /**
     * @param $to
     * @param $from
     * @param $subject
     * @param $text
     * @param null $domain
     * @return mixed
     */
    function email($to, $from, $subject, $text, $domain = null)
    {
        $mailer = \NPCore\AppCapsule::mailer();
        return $mailer->send($to, $from, $subject, $text, $domain);
    }
}
