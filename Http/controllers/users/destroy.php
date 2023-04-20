<?php

use Core\App;
use Core\Database;

// $date=date("Y-m-d H:i:s");

$db = App::resolve(Database::class);

$currentUserId = 1;

$user = $db->query('select * from users where id = :id', [
    'id' => $_POST['id']
])->findOrFail();



$db->query('update `users` set is_deleted= :date where id= :id', [
    'id' => $_POST['id'],
    "date"=>date("Y-m-d H:i:s")

]);

header('location: /users');
exit();
