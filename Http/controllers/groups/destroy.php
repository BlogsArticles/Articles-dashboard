<?php
use Core\App;
use Core\Database;
use Core\Validator;
use Core\Logger;
use Core\Response;
use Core\Authentication as Auth;

Auth::only_admin();



$db = App::resolve(Database::class);
$message;

if(!isset($_POST["id"])){
    abort(Response::NOT_FOUND);
}
// change after users is finished to use user auth ToDo
/**
 * check if group not admin or editor before delete
 */
if(in_array($_POST["id"] ,[1,2])){
    // abort(Response::FORBIDDEN);
    $message["error"]="couldn't delete this group";
    $_SESSION["_flash"]["delete_message"]=$message;

    header('location: /groups');
    die();
}

$group = $db->query('select * from `groups` where id= :id',[
    "id"=>$_POST["id"]
])->findOrFail();

$updated=$db->query('update `groups` set is_deleted= :date where id= :id',[
    "id"=>$_POST["id"],
    "date"=>date("Y-m-d H:i:s")
]);
$message["success"]="group deleted successfuly";
$_SESSION["_flash"]["delete_message"]=$message;

header('location: /groups');
die();

