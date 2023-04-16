<?php

use Core\App;
use Core\Database;
use Core\Logger;
use Core\Response;
use Core\Authentication as Auth;

Auth::only_admin();


$db = App::resolve(Database::class);
$users=[];
if(isset($_GET["id"])){
    $users = $db->query('select users.*,groups.name as group_name from `users`,`groups` where users.group_id=:id and users.group_id = groups.id and users.is_deleted is null and groups.is_deleted is null ',[
        "id"=>$_GET["id"]
        ])->get();
}

view("groups/show.view.php",[
    "users"=>$users
]);

