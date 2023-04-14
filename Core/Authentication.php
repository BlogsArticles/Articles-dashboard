<?php

namespace Core;


class Authentication
{

    public static function checkUser($email, $password)
    {
        $query = 'select * from users where email = :email';

        $user = App::resolve(Database::class)->query($query, [

            'email'=>$email

        ])->find();

        if ($user) {
            // you should use verify password function
            if ($password == $user['password']) {
                
                self::login($user);

                return true ;

            } else return false ;

        } else {

            return false;
        }
    }

    private static function login($user)
    {
        $_SESSION['user_id'] = $user['id'];
    }

    
    // Auth function that returns the authenticated user's information
    public static function auth()
    {

        if (isset($_SESSION['user'])) {

            $query = 'select * from users where id = :id';

            return App::resolve(Database::class)->query($query, [
    
                'id'=>$_SESSION['user']['user_id']
    
            ])->find();
    
        } else {

            return null;
        }
    }

    public function logout()
    {

        unset($_SESSION['user_id']);
        
    }
}

