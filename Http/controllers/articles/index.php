<?php

use Core\App;
use Core\Database;


$db = App::resolve(Database::class);

$articles = $db
    ->query("select * from articles where is_deleted IS NULL")
    ->get();

view("articles/index.view.php", [
    'errors' => [],
    'articles' => $articles
]);