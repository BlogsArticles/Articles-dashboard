<?php

use Core\App;
use Core\Database;
use Core\Authentication as Auth;

Auth::only_admin();

$db = App::resolve(Database::class);

if (isset($_GET['search'])) {

    $user = $db->query('select u.* ,g.name as group_name  from users u ,`groups` g where u.group_id= g.id and u.name like :name  and u.is_deleted is null;', [
        'name' => "%" . $_GET['search'] . "%"

    ])->get();

    view("users/index.view.php", [
        'users' => $user
    ]);

}

$users = $db->query('select u.* ,g.name as group_name  from users u ,`groups` g where u.group_id= g.id and  u.is_deleted is null;')->get();

view("users/index.view.php", [
    'users' => $users
]);