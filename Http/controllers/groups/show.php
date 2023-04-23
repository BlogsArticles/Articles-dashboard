<?php

use Core\App;
use Core\Database;
use Core\Logger;
use Core\Response;
use Core\Authentication as Auth;

Auth::only_admin();

$start=0;
$offset=10;
$max=0;
$page=1;
if(isset($_GET["page"]) && is_numeric($_GET["page"])){
    $page=intval($_GET["page"]);
    $start=($page-1)*$offset;
    
}

$db = App::resolve(Database::class);
$users=[];
if(isset($_GET["id"])){
    $count=$db->query('select count(*) from `users`,`groups` where users.group_id=:id and users.group_id = groups.id and users.is_deleted is null and groups.is_deleted is null ',[
        "id"=>$_GET["id"]
    ])->find();

    $max=ceil($count["count(*)"]/$offset);
    $users = $db->query('select users.*,groups.name as group_name from `users`,`groups` where users.group_id=:id and users.group_id = groups.id and users.is_deleted is null and groups.is_deleted is null ',[
        "id"=>$_GET["id"]
        ])->get();
}

view("groups/show.view.php",[
    "users"=>$users,
    "page"=>$page,
    "max"=>$max
]);

