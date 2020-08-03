<?php

return [
    'driver' => \NPCore\Email\Drivers\MailgunEmailDriver::class,
    'defaults' => [
        'domain' => 'nptunnel.com',
        'from' => 'contato@nptunnel.com'
    ],
    'mailgun' => [
        'api-key' => env('MAILGUN_KEY'),
    ]
];