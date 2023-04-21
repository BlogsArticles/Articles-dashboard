<?php 

use Core\App;
use Core\Database;

if(isset($_GET['search'])){
// dd($_GET['search']);
$db = App::resolve(Database::class);

$user = $db->query('select u.* ,g.name as group_name  from users u ,`groups` g where u.group_id= g.id and u.name like :name  and u.is_deleted is null;', [
    'name' => "%".$_GET['search']."%"
    
])->get();

dd($user);

view("users/index.view.php", [
   
    'users' => $user
]);

}else

$db = App::resolve(Database::class);
$users = $db->query('select u.* ,g.name as group_name  from users u ,`groups` g where u.group_id= g.id and  u.is_deleted is null;')->get();

// select * from `groups` where is_deleted is null

// var_dump($users);

view("users/index.view.php", [
   
    'users' => $users
]);




// view("users/index.view.php");