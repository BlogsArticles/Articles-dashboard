<?php

use Core\App;
use Core\Database;


$db = App::resolve(Database::class);
$recordsPerPage = 10;
$page = $_GET['page'] ?? 1;
$offset = ($page - 1) * $recordsPerPage;

$articles = $db
    ->query("select * from articles where is_deleted IS NULL LIMIT {$offset} , {$recordsPerPage}")
    ->get();

view("articles/index.view.php", [
    'errors' => [],
    'articles' => $articles,
    'recordsPerPage' => $recordsPerPage,
    'page' => $page
]);