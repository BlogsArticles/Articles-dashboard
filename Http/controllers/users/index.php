<?php 

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$users = $db->query('select u.* ,g.name as group_name  from users u ,blog.groups g where u.group_id= g.id and  u.is_deleted is null;')->get();

// select * from `groups` where is_deleted is null

// var_dump($users);

view("users/index.view.php", [
   
    'users' => $users
]);




// view("users/index.view.php");