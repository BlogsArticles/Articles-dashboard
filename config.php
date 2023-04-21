<?php

return [
    'database' => [
        'host' => 'localhost',
        'port' => 3306,
        'dbname' => 'blog',
        'charset' => 'utf8mb4'
    ],
    'username' => 'root',
    'password' => '1896',
    'logs' => [
        'file' => BASE_PATH . 'storage/logs/log.txt',
    'EXPIRATION_DATE'=> 24 * 60 * 60
    ]
];
