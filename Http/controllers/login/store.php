<?php 

use Core\App;
use Core\Validator;
use Core\Database;

$db = App::resolve(Database::class);

// check if user mark remember me or not 



// check credentials of that user
if (!empty($_POST['email']) && !empty($_POST['password'])) {

    $query = 'select * from users where email = :email';

    $user = $db->query($query, [
        'email'=>$_POST['email']
    ])->find();

    if ($user) {

        if ($_POST['password'] == $user['password']) view('index.view.php');

        else view('login/index.view.php', [

            'error'=> 'Invalid password'
        ]);
        
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

