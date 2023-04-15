<?php
use Core\App;
use Core\Database;
use Core\Logger;
use Core\Response;

try{
    $db = App::resolve(Database::class);
    if(!isset($_GET["id"])){
        abort(Response::NOT_FOUND);
    }
    
    $group = $db->query('select * from `groups` where id= :id',[
        "id"=>$_GET["id"]
    ])->findOrFail();
    
    // dd($group);
    $icons = $db->query('select * from `icons`')->get();

    $old=$group;
    // $old["name"]=$group["name"]??'';
    view("groups/edit.view.php",[
        "icons"=>$icons,
        "old"=>$old]);
}catch(\Exception $e){
    Logger::error($e);

}

