<?php

return [
    'log' => realpath(__DIR__.'/../logs'),
    'http' => [
        'controllers' => [
            'defaults' => [
                'namespace' => 'NPDashboard\\Http\\Controllers\\'
            ]
        ]
    ]
];