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

            $password == $user['password'] ? true : false;

        } else {

            return false;
        }
    }
}

