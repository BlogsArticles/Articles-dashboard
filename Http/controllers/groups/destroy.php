<?php
use Core\App;
use Core\Database;
use Core\Validator;
$db = App::resolve(Database::class);


if(!isset($_POST["id"])){
    abort(404);
}

$group = $db->query('select * from articles_blog.groups where id= :id',[
    "id"=>$_POST["id"]
])->findOrFail();


$db->query('delete from articles_blog.groups where id= :id',[
    "id"=>$_POST["id"]
]);

header('location: /groups');
die();