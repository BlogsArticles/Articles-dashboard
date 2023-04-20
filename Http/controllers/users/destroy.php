<?php

use Core\App;
use Core\Database;
use Core\Authentication as Auth;


Auth::only_admin();

$db = App::resolve(Database::class);

$user = $db->query('select * from users where id = :id', [
    'id' => $_POST['id']
])->findOrFail();

$db->query('update `users` set is_deleted= :date where id= :id', [
    'id' => $_POST['id'],
    "date"=>date("Y-m-d H:i:s")
]);

header('location: /users');
exit();
