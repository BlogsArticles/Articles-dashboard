<?php

namespace Core\Middleware;

use Core\Authentication as Auth;

class Remembered
{
    public function handle()
    {

        if (! $_COOKIE['remember_token']) {
            
            header('location: /login');
            exit();
            
        }

        if (! Auth::checkToken($_COOKIE['remember_token'])) {

            header('location: /login');
            exit();
        }
    }
}