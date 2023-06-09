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
    ],
    'EXPIRATION_DATE'=> 24 * 60 * 60,

    's3' => [
        '_ACCESS_KEY_' => '<your-_ACCESS_KEY_>',
        '_SECRET_' => '<your-_SECRET_>',
        '_S3_Bucket_' => '<your-_S3_Bucket_>'
    ]
];