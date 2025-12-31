<?php

return [
    'paths' => ['api/*', 'sanctum/csrf-cookie'],
    'allowed_methods' => ['*'],

    // Add your landing page here
    'allowed_origins' => [
        'https://keeperlibrary.online',
        'http://localhost:5000',
        'http://127.0.0.1:5500', // Add this (Live Server default)
        'http://localhost:5500',  // Add this just in case
    ],

    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'],
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => true, // Essential for Auth
];
