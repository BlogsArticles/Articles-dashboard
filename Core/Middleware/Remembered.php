<?php

namespace Core\Middleware;

use Core\Authentication;

class Remembered
{
    public function handle()
    {

        if (! $_COOKIE['remember_token']) {
            
            header('location: /login');
            exit();
            
        }

        if (Authentication::checkToken($_COOKIE['remember_token'])) {

            header('location: /login');
            exit();
        }
    }
}