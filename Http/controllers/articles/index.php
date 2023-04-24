<?php

use Core\App;
use Core\Authentication;
use Core\Database;
use Core\Response;

if(!(has_role('admin') || has_role('editor'))){
    abort(Response::FORBIDDEN);
}

$db = App::resolve(Database::class);
$start=0;
$offset=10;
$max=0;
$page=1;

$count=$db->query('select count(*) from `articles` where is_deleted is null')->find();
$max=ceil($count["count(*)"]/$offset);
$articles = $db
    ->query("select * from articles where is_deleted IS NULL LIMIT $start,$offset")
    ->get();

view("articles/index.view.php", [
    'errors' => [],
    'articles' => $articles,
    "max"=>$max,
    "page"=>$page
]);