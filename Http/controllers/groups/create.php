<?php
use Core\App;
use Core\Database;
$db = App::resolve(Database::class);
$icons = $db->query('select * from `icons`')->get();
// dd($icons["name"]);
$old=[];
view("groups/create.view.php",["icons"=>$icons,"old"=>$old]);
