<?php

use Core\App;
use Core\Database;
use Core\Authentication as Auth;

Auth::only_admin();

$db = App::resolve(Database::class);

$start=0;
$offset=10;
$max=0;
$page=1;

if(isset($_GET["page"]) && is_numeric($_GET["page"])){
    $page=intval($_GET["page"]);
    $start=($page-1)*$offset;
    
}
if (isset($_GET['search'])) {
    $count=$db->query('select count(*) from `users` where is_deleted is null and name like :search',[
        "search"=>'%'.$_GET["search"].'%'
        ])->find();
    $max=ceil($count["count(*)"]/$offset);

    $users = $db->query("select u.* ,g.name as group_name  from users u ,`groups` g where u.group_id= g.id and u.name like :name  and u.is_deleted is null LIMIT  $start,$offset;", [
        'name' => "%" . $_GET['search'] . "%"
    ])->get();
}else{
    $count=$db->query('select count(*) from `users` where is_deleted is null')->find();
    $max=ceil($count["count(*)"]/$offset);

    $users = $db->query("select u.* ,g.name as group_name  from users u ,`groups` g where u.group_id= g.id and  u.is_deleted is null LIMIT  $start,$offset;")->get();
}


view("users/index.view.php", [
    'users' => $users,
    "max"=>$max,
    "page"=>$page
]);