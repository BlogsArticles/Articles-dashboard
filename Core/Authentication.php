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

                return $user ;

            } else {

                return false ;
            }

        } else {

            return false;
        }
    }

    private static function login($user)
    {
        $_SESSION['user_id'] = $user['id'];
    }

    
    // user function that returns the authenticated user's information
    public static function user()
    {

        if (isset($_SESSION['user_id'])) {

            $query = 'select * from users where id = :id';

            return App::resolve(Database::class)->query($query, [
    
                'id'=>$_SESSION['user_id']
    
            ])->find();
    
        } else {

            return null;
        }
    }

    public static function logout()
    {

        unset($_SESSION['user_id']);

    }

    public static function rememberMe($id)
    {

        if (isset($_POST['remember_me'])) {
            
            $token = bin2hex(random_bytes(16));

            setcookie('remember_token', $token, [
                'expires'=> time() + (5 * 60),
                'httponly'=> true

            ]);
        
            $query = 'UPDATE users SET remember_me = :token  WHERE id =:id';

            App::resolve(Database::class)->query($query, [
                'id' => $id,
                'token'=>$token
            ]);
        }
    }
}

