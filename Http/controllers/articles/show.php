<?php
use Core\App;
use Core\Database;
use Core\AwsS3Bucket;
$db = App::resolve(Database::class);

$articleId = intval($_GET['id']);

$article = $db
    ->query("select * from articles where is_deleted IS NULL and id= :id",[
        'id' => $articleId
    ])
    ->find();


if ($article) {

    $image= (new AwsS3Bucket())->downloadImage($article['image'].'.jpg');

    view('articles/show.view.php',[
        'errors' => [],
        'article' => $article,
        'image' => $image
    ]);
}else{
    view('404.php');
}