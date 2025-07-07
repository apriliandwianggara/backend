<?php

return [
    /*
     |--------------------------------------------------------------------------
     | Cross-Origin Resource Sharing (CORS) Configuration
     |--------------------------------------------------------------------------
     |
     | Here you may configure your settings for cross-origin resource sharing
     | or "CORS". This determines which domains are allowed to access your
     | API via cross-origin HTTP requests.
     |
     */

    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['*'], // Mengizinkan semua metode HTTP (GET, POST, PUT, DELETE, dll.)

    'allowed_origins' => ['http://localhost:5173'], // IZIN UTAMA: Hanya izinkan permintaan dari frontend React Anda
    // Atau jika Anda ingin mengizinkan dari mana saja (kurang aman untuk produksi):
    // 'allowed_origins' => ['*'],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'], // Mengizinkan semua header
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => false,

];