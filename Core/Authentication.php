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

            // $password == $user['password'] ? true : false;

            if ($password == $user['password']){ // you should use verify password function 
                
                self::login($user);

                return true ;

            } else return false ;

        } else {

            return false;
        }
    }

    private static function login($user)
    {
        $_SESSION['user'] = [
            'user_id' => $user['id']
        ];
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
}

