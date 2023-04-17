<?php
use Core\App;
use Core\Database;
use Core\Logger;
use Core\Response;
use Core\Authentication as Auth;


Auth::only_admin();

$db = App::resolve(Database::class);


$icons = $db->query('select * from `icons`')->get();
$old=[];
view("groups/create.view.php",["icons"=>$icons,"old"=>$old]);


