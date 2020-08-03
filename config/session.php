<?php

return [
    'cookie' => 'npd_session',
    'lifetime' => 1440, // minutes
    'files' => realpath(__DIR__.'/../compiled/sessions'),
];