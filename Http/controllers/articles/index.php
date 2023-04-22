<?php

use Core\App;
use Core\Authentication;
use Core\Database;
use Core\Response;

if(!(has_role('admin') || has_role('editor'))){
    abort(Response::FORBIDDEN);
}

$db = App::resolve(Database::class);

$articles = $db
    ->query("select * from articles where is_deleted IS NULL")
    ->get();

view("articles/index.view.php", [
    'errors' => [],
    'articles' => $articles
]);