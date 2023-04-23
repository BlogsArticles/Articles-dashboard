<?php

use Core\App;
use Core\Database;
use Core\Authentication as Auth;


Auth::only_admin();

$db = App::resolve(Database::class);


$user = $db->query('select u.* ,g.name as group_name  from users u ,`groups` g where u.group_id= g.id and u.id = :id', [
    'id' => $_GET['id']
])->findOrFail();


$group_name = $db->query('select name,id from `groups`; ')->get();

view("users/edit.view.php", [
    'heading' => 'Edit Note',
    'group_name'=>$group_name,
    'user' => $user
]);