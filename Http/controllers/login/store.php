<?php 

use Core\Authentication as Auth;


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

        'error'=> 'Email and Password are required'
    ]);
}

