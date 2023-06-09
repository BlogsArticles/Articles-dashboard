<?php

use Core\Response;
use Http\Requests\StoreArticlesRequest;
use Core\Database;
use Core\App;
use Core\AwsS3Bucket;

if(!(has_role('admin') || has_role('editor'))){
    abort(Response::FORBIDDEN);
}

$errors = (new StoreArticlesRequest)->validateAll();

if( !empty($errors) ){
    view('articles/create.view.php',[
        'errors' => $errors
    ]);
}
else {
    /*
     * image handling
     * */
    $imageNewName = uniqid();
    try{
        ( new AwsS3Bucket() )->uploadImage($imageNewName.'.jpg',$_FILES['image']['tmp_name']);
    }catch (Exception $e) {
        view('500.php');
        die();
    }
    /*
     * Database
    * */
    $db = App::resolve(Database::class);
    $db->query("INSERT INTO articles (title, content, summary , image) VALUES (:title, :content, :summary , :image)",[
      'title' =>  $_POST['title'],
      'content' => $_POST['content'],
      'summary' => $_POST['summary'],
      'image' => $imageNewName
    ]);

    redirect('/articles'); // redirect to the index.view.php
}

