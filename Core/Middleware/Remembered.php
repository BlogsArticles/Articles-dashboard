<?php

namespace Core\Middleware;

use Core\App;
use Core\Authentication as Auth;
use Core\Database;

class Remembered
{
    public function handle()
    {

        if (! ($_COOKIE['remember_token'] ?? false)) {
            
            (new Authenticated())->handle();
            
        }
        
        if (! Auth::checkToken($_COOKIE['remember_token'] ?? null)) {
            
            (new Authenticated())->handle();
        }

        if (! ($_SESSION['user_id'] ?? false)) {
            
            $query = 'select id from users where remember_me = :token';
            
            $id = App::resolve(Database::class)->query($query, [
                'token'=>$_COOKIE['remember_token']
            ])->find();
            
            $_SESSION['user_id'] = $id['id'] ;
        }
    }
}