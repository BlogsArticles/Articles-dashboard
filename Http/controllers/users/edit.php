<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = $_GET['id'];

$user = $db->query('select u.* ,g.name as group_name  from users u ,blog.groups g where u.group_id= g.id and u.id = :id', [
    'id' => $_GET['id']
])->findOrFail();

var_dump($user);
// authorize($user['id'] === $currentUserId);
$group_name = $db->query('select name,id from blog.groups; ')->get();
// $users_group = $db->query('select u.* ,g.name as group_name  from users u ,blog.groups g where u.group_id= g.id;')->get();

view("users/edit.view.php", [
    'heading' => 'Edit Note',
    'errors' => [],
    'group_name'=>$group_name,
    'user' => $user
]);