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

/**
 *  validate data
 */
if (! Validator::string($_POST['name'], 5, 100)) {
    $errors['name'] = 'Group name should be provided.';
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
$groups_exists=$db->query("select * from articles_blog.groups where name = :name",["name"=>$_POST['name']])->find();

/**
 *  if all data is good save and redirect to index
 */
if(!$groups_exists && empty($errors)){
    $icons = $db->query('insert into articles_blog.groups (name, description,icon) VALUES(:name, :description,:icon)', [
        'name' => $_POST['name'],
        'description' => $_POST['description'],
        'icon' =>$_POST['icon'],
    ]);
    header("location: /groups");
    die();

}

/**
 *  if group already exist add error message
 */
if ($groups_exists) {
    $errors['name'] = 'Group name should be unique.';
}

/**
 *  data isn't valid
 *  reload create group page again 
 */
$icons = $db->query('select * from articles_blog.icons')->get();
view("groups/create.view.php",[
    "old"=>$old,
    "errors"=>$errors,
    "icons"=>$icons
]);


