<?php 

use Core\App;
use Core\Authentication as Auth;
use Core\Validator;


$email = $_POST['email'];
$password = $_POST['password'];

if ($email && $password) {

    $user = Auth::checkUser($email, $password);

    if ($user) {

        Auth::rememberMe($user['id']);
        view('index.view.php');

    } else {

        view('login/index.view.php', [

            'error'=> 'Invalid email or password'
        ]);
    }

} else {

    view('login/index.view.php', [

        'error'=> 'email and Password are required'
    ]);
}

