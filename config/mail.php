<?php

return [

    'default' => env('MAIL_MAILER', 'smtp'),

    'mailers' => [

        // === Primary SMTP (Admin/Ruler Sends Reports to Users)
        'smtp' => [
            'transport' => 'smtp',
            'host' => env('MAIL_HOST', 'smtp.gmail.com'),
            'port' => env('MAIL_PORT', 587),
            'encryption' => env('MAIL_ENCRYPTION', 'tls'),
            'username' => env('MAIL_USERNAME'),
            'password' => env('MAIL_PASSWORD'),
            'timeout' => null,
            'local_domain' => env('MAIL_EHLO_DOMAIN', parse_url(env('APP_URL', 'http://localhost'), PHP_URL_HOST)),
        ],

        // === Secondary SMTP (General Sends Requests to HQ)
        'general' => [
            'transport' => 'smtp',
            'host' => env('GENERAL_MAIL_HOST', 'smtp.gmail.com'),
            'port' => env('GENERAL_MAIL_PORT', 587),
            'encryption' => env('GENERAL_MAIL_ENCRYPTION', 'tls'),
            'username' => env('GENERAL_MAIL_USERNAME'),
            'password' => env('GENERAL_MAIL_PASSWORD'),
            'timeout' => null,
            'local_domain' => env('MAIL_EHLO_DOMAIN', parse_url(env('APP_URL', 'http://localhost'), PHP_URL_HOST)),
        ],

        'log' => [
            'transport' => 'log',
            'channel' => env('MAIL_LOG_CHANNEL'),
        ],

        'array' => [
            'transport' => 'array',
        ],

        'failover' => [
            'transport' => 'failover',
            'mailers' => ['smtp', 'log'],
            'retry_after' => 60,
        ],
    ],

    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'tahanyemad30@gmail.com'),
        'name' => env('MAIL_FROM_NAME', 'Ternary Arsenal'),
    ],
];
