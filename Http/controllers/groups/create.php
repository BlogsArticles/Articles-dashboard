<?php
use Core\App;
use Core\Database;
use Core\Logger;
use Core\Response;

$db = App::resolve(Database::class);



$icons = $db->query('select * from `icons`')->get();
$old=[];
view("groups/create.view.php",["icons"=>$icons,"old"=>$old]);


