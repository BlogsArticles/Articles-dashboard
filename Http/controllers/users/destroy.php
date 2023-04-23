<?php

use Core\App;
use Core\Database;
use Core\Authentication as Auth;


Auth::only_admin();

$db = App::resolve(Database::class);

$user = $db->query('select * from users where id = :id', [
    'id' => $_POST['id']
])->findOrFail();

if($user["group_id"]==1){
    $message["error"]="couldn't delete this user";
    $_SESSION["_flash"]["delete_message"]=$message;

    header('location: /groups');
    die();
}
$db->query('update `users` set is_deleted= :date where id= :id', [
    'id' => $_POST['id'],
    "date"=>date("Y-m-d H:i:s")
]);
$message["success"]="user deleted successfuly";
$_SESSION["_flash"]["delete_message"]=$message;

header('location: /users');
exit();
