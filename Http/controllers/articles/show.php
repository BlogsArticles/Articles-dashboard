<?php
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$articleId = intval($_GET['id']);

$article = $db
    ->query("select * from articles where is_deleted IS NULL and id= :id",[
        'id' => $articleId
    ])
    ->find();

view('articles/show.view.php',[
    'errors' => [],
    'article' => $article
]);