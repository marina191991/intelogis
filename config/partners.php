<?php

return [
    'fast' => [
        'base_url' => env('FAST_BASE_URL', 'https://fast-delivery.ru/'),
        'token' => env('FAST_TOKEN', 'fast_secret_token')
    ],
    'slow' => [
        'base_url' => env('SLOW_BASE_URL', 'https://slow-delivery.ru/'),
        'token' => env('SLOW_TOKEN', 'slow_secret_token')
    ],
];
