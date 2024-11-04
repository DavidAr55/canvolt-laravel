<?php

return [
    'paths' => ['api/*', 'login', 'logout', 'register', '*'],
    'allowed_methods' => ['*'],
    'allowed_origins' => [
        env('APP_URL'), 
        env('CANVOLT_ADMIN_URL')
    ],
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'],
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => true,
];
