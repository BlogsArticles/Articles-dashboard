<?php

use Core\App;
use Core\Database;
use Core\Logger;
use Core\Response;
use Core\Authentication as Auth;

Auth::only_admin();

$db = App::resolve(Database::class);
$start=0;
$number=10;
$max=0;
$page=1;

if(isset($_GET["page"]) && is_numeric($_GET["page"])){
    $page=intval($_GET["page"]);
    $start=($page-1)*$number;
    
}
if(isset($_GET["search"])){
    $max=$db->query('select count(*) from `groups` where is_deleted is null and (name like :search or description like :search)',["search"=>'%'.$_GET["search"].'%'])->find();
    $max=ceil($max["count(*)"]/$number);
    $groups = $db->query("select * from `groups` where is_deleted is null and (name like :search or description like :search) LIMIT  $start,$number",["search"=>'%'.$_GET["search"].'%'])->get();
    
}else{
    $max=$db->query('select count(*) from `groups` where is_deleted is null')->find();
    $max=ceil($max["count(*)"]/$number);

    $groups = $db->query("select * from `groups` where is_deleted is null LIMIT $start,$number",[
        
    ])->get();
}
view("groups/index.view.php",[
    "groups"=>$groups,
    "max"=>$max,
    "page"=>$page
]);

