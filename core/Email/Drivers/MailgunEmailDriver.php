<?php


namespace NPCore\Email\Drivers;

use NPCore\Email\Drivers\Contracts\EmailDriverContract;
use Mailgun\Mailgun;
use GuzzleHttp\Client;

class MailgunEmailDriver implements EmailDriverContract
{
    /**
     * @var Mailgun
     */
    private $mailgun;

    public function __construct()
    {
        $key = config()['email']['mailgun']['api-key'];
        $this->mailgun = Mailgun::create($key);
    }

    /**
     * @param $to
     * @param $from
     * @param $subject
     * @param $text
     * @param null $domain
     * @return \Mailgun\Model\Message\SendResponse
     */
    public function send($to, $from, $subject, $text, $domain = null)
    {
        $domain = ($domain === null) ? config()['email']['defaults']['domain'] : $domain;
        try {
            return $this->mailgun
                ->messages()
                ->send($domain, [
                    'from'      => $from,
                    'to'        => $to,
                    'subject'   => $subject,
                    'html'      => $text
                ]);
        }catch (\Exception $exception) {
            echo $exception->getMessage();
            exit();
        }
    }

    /**
     * @return string
     */
    public function monthlyFiredEmails()
    {
        return "indisponível";
    }

    /**
     * @return string
     */
    public function todayFiredEmails()
    {
        return "indisponível";
    }
}