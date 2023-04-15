<?php 

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$users = $db->query('select id,name,email,phone from users')->get();

var_dump($users);

view("users/index.view.php", [
    'heading' => 'My Notes',
    'users' => $users
]);




// view("users/index.view.php");