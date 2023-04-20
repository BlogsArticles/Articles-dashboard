<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);


// find the corresponding user
$user = $db->query('select u.* ,g.name as group_name  from users u ,`groups` g where u.group_id= g.id and u.id = :id', [
    'id' => $_POST['id']
])->findOrFail();


$email = $_POST['email'] ?? "";
$password = $_POST['password'] ?? "";
$name = $_POST['name'] ?? "";
$user_name = $_POST['user_name'] ?? "";
$group_id = $_POST['group_id'] ?? "";
$phone = $_POST['phone'] ?? "";
$date = date("Y-m-d H:i:s");




$errors = [];
if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address.';
}



if (!Validator::string($name, 7, 255)) {
    $errors['name'] = 'Please provide a name of at least seven characters.';
}

if (!Validator::string($name, 7, 255)) {
    $errors['user_name'] = 'Please provide a user name of at least seven characters.';
}

if (!Validator::number($phone)) {
    $errors['phone'] = 'Please provide a valid number.';
}

if (!Validator::number($group_id)) {
    $errors['group_id'] = 'Please provide a valid group.';
}

$user_email_exists = $db->query(
    'select * from users where email = :email and users.id != :id',
    [
        'email' => $email,
        'id' => $_POST['id']
    ]
)->find();

if ($user_email_exists) {
    $errors['email'] = 'this email already exists.';
}

// dd($errors);
if (!empty($errors)) {
    // dd("hi");
    $group_name = $db->query('select name,id from `groups`; ')->get();


    view('users/edit.view.php', [
        'errors' => $errors,
        'group_name' => $group_name,
        'user' => $user


    ]);

    exit();
}

if(isset($_POST['password'])){
$hashed_password = hash('sha256', $_POST['password']);


if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'Please provide a password of at least seven characters.';
}


$db->query('update users set name = :name , username=:username, password=:password, group_id= :group_id, email=:email, phone=:phone where id = :id', [
    'id' => $_POST['id'],
    'email' => $email,
    'password' => $hashed_password,
    'name' => $name,
    'username' => $user_name,
    'group_id' => $group_id,
    'phone' => $phone,

]);
} else
{
    $db->query('update users set name = :name , username=:username,  group_id= :group_id, email=:email, phone=:phone where id = :id', [
    'id' => $_POST['id'],
    'email' => $email,
    'name' => $name,
    'username' => $user_name,
    'group_id' => $group_id,
    'phone' => $phone,
]);
}

// redirect the user
header('location: /users');
die();
