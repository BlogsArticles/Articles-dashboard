<?php
use Core\App;
use Core\Database;
$db = App::resolve(Database::class);

$groups = $db->query('select * from articles_blog.groups')->get();
// dd($groups);
view("groups/index.view.php",[
    "groups"=>$groups
]);