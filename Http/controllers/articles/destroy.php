<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$article_Id = $_POST['id'];

$db->query("UPDATE articles SET is_deleted = now() WHERE id = :id;",[
    "id" => $article_Id
])->get();

redirect('/articles');// redirect to the index.view.php