<?php
use Core\App;
use Core\Database;
$db = App::resolve(Database::class);

if(!isset($_GET["id"])){
    abort(404);
}

$group = $db->query('select * from `groups` where id= :id',[
    "id"=>$_GET["id"]
])->findOrFail();

// dd($group);
$icons = $db->query('select * from `icons`')->get();


$old=$group;
// $old["name"]=$group["name"]??'';
view("groups/edit.view.php",[
    "icons"=>$icons,
    "old"=>$old]);
