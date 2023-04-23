<?php

use Core\App;
use Core\Database;
use Core\Authentication as Auth;


Auth::only_admin();


$db = App::resolve(Database::class);
$group_name = $db->query('select name,id from `groups`; ')->get();

view("users/create.view.php", [
    'group_name' => $group_name
]);


