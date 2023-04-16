<?php
use Core\App;
use Core\Database;
use Core\Logger;
use Core\Response;

$db = App::resolve(Database::class);

if(!isset($_GET["id"])){
    abort(Response::NOT_FOUND);
}

$group = $db->query('select * from `groups` where id= :id',[
    "id"=>$_GET["id"]
])->findOrFail();

$icons = $db->query('select * from `icons`')->get();

$old=$group;
view("groups/edit.view.php",[
    "icons"=>$icons,
    "old"=>$old]);


