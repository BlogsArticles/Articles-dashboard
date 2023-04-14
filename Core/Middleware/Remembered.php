<?php

namespace Core\Middleware;
use Core\App;

class Remembered
{
    public function handle()
    {
        if (isset($_COOKIE['remember_token'])) {

            $query = "SELECT user_id FROM users WHERE remember_me = :token ";

            $result = App::resolve(Database::class)->query($query, [
                
                'remember_me' => $_COOKIE['remember_token'],
            ]);
        
    
            if (!$result) {
                
                redirect('/login');
            }
        }
    }
}