<?php
use Core\App;
use Core\Database;
use Core\Validator;
use Http\Requests\storeGroupsRequest;

$db = App::resolve(Database::class);

$errors = (new storeGroupsRequest())->rules();

/**
 *  save old values
 */
$old=[];

$old["name"]=$_POST['name']??'';
$old["icon"]=$_POST['icon']??'';
$old["description"]=$_POST['description']??'';


/**
 *  if all data is good save and redirect to index
 */
if(empty($errors)){
    $icons = $db->query('insert into `groups` (name, description,icon) VALUES(:name, :description,:icon)', [
        'name' => $_POST['name'],
        'description' => $_POST['description'],
        'icon' =>$_POST['icon'],
    ]);
    header("location: /groups");
    die();

}


/**
 *  data isn't valid
 *  reload create group page again 
 */
$icons = $db->query('select * from `icons`')->get();
view("groups/create.view.php",[
    "old"=>$old,
    "errors"=>$errors,
    "icons"=>$icons
]);


