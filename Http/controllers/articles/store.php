<?php

use Http\Requests\StoreArticlesRequest;
use Core\Database;
use Core\App;

$errors = (new StoreArticlesRequest)->validateAll();

if( !empty($errors) ){
    view('articles/create.view.php',[
        'errors' => $errors,
        'old' => $_POST
    ]);
}
else {
    /*
     * image handling name
     * */
    $imageNewName = uniqid();
    moveImage($imageNewName);
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

