<?php

use Core\Response;

if(!(has_role('admin') || has_role('editor'))){
    abort(Response::FORBIDDEN);
}

view('articles/create.view.php',[
        'errors' => []
]);