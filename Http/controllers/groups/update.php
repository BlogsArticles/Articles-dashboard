<?php
use Core\App;
use Core\Database;
use Core\Validator;
$db = App::resolve(Database::class);

$errors = [];

/**
 *  save old values
 */
$old=[];
$old["name"]=$_POST['name']??'';
$old["icon"]=$_POST['icon']??'';
$old["description"]=$_POST['description']??'';
$old["id"]=$_POST['id']??'';
/**
 *  check if group exist 
 */

if (! isset($_POST['id'])) {
    abort(404);
}
$group=$db->query("select * from articles_blog.groups where id = :id",["id"=>$_POST['id']])->find();
if(!$group){
    abort(404);
}
/**
 *  validate data
 */
if (! Validator::string($_POST['name'], 4, 100)) {
    if(!empty($_POST['name'])){
        $errors['name'] = 'A Group name of no less than 4 characters is required.';
    }else{
        $errors['name'] = 'Group name should be provided.';
    }
}

/**
 *  check if icon exists in database
 */
$isIcon=$db->query("select * from articles_blog.icons where name = :name",["name"=>$_POST['icon']])->find();
if ($isIcon==false) {
    $errors['icon'] = 'Group should have an icon from menu.';
}

if (! Validator::string($_POST['description'], 10, 255)) {
    $errors['description'] = 'A Group description of no more than 1,000 characters is required.';
}

/**
 *  check if group already exist
 */
$group_name_exists=$db->query("select * from articles_blog.groups where name = :name and id!= :id ",[
    "name"=>$_POST['name'],
    "id"=>$_POST['id']]
    )->find();
/**
 *  if all data is good save and redirect to index
 */
if(!$group_name_exists && empty($errors)){
    $updated=$db->query('update articles_blog.groups  set name= :name, description= :description,icon= :icon where id=:id', [
        'name' => $_POST['name'],
        'description' => $_POST['description'],
        'icon' =>$_POST['icon'],
        'id' =>$_POST['id'],
    ]);
    // dd($updated);
    header("location: /groups");
}

/**
 *  if group already exist add error message
 */
if ($group_name_exists) {
    $errors['name'] = 'Group name should be unique.';
}

/**
 *  data isn't valid
 *  reload create group page again 
 */
$icons = $db->query('select * from articles_blog.icons')->get();
view("groups/edit.view.php",[
    "old"=>$old,
    "errors"=>$errors,
    "icons"=>$icons
]);


