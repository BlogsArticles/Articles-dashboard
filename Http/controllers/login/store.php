<?php 

use Core\App;
use Core\Authentication as Auth;
use Core\Validator;

// check if user mark remember me or not


// check credentials of that user
if (!empty($_POST['email']) && !empty($_POST['password'])) {

    if (Auth::checkUser($_POST['email'], $_POST['password'])){

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

