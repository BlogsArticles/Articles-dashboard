<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$group_name = $db->query('select name,id from blog.groups; ')->get();

var_dump($group_name);

view("users/create.view.php", [
   
    'group_name' => $group_name
]);


