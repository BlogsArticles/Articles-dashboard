<?php

namespace Core\Middleware;

class Authenticated
{
    public function handle()
    {
        if (! $_SESSION['user_id'] ?? false) {

            header('location: /login');
            exit();
        }

    }
}