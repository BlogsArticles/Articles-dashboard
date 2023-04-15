<?php

return [
    'database' => [
        'host' => 'localhost',
        'port' => 3306,
        'dbname' => 'Blogs',
        'charset' => 'utf8mb4'
    ],
    'username' => 'root',
    'password' => 'password',
    'logs' => [
        'file' => BASE_PATH . 'storage/logs/log.txt',
    'EXPIRATION_DATE'=> 24 * 60 * 60
    ]
];
