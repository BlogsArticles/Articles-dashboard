<?php

use Core\App;
use Core\Database;
use Core\Response;

if(!(has_role('admin') || has_role('editor'))){
    abort(Response::FORBIDDEN);
}

$db = App::resolve(Database::class);
$article_Id = $_POST['id'];

$db->query("UPDATE articles SET is_deleted = now() WHERE id = :id;",[
    "id" => $article_Id
])->get();
$message["success"]="Article deleted successfuly";
$_SESSION["_flash"]["delete_message"]=$message;
redirect('/articles');// redirect to the index.view.php