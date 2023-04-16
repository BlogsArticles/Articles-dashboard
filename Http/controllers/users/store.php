<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

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

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'Please provide a password of at least seven characters.';
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

$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

if ($user) {
    $errors['email'] = 'this email already exists.';
}


if (!empty($errors)) {
    // dd("hi");
    $group_name = $db->query('select name,id from blog.groups; ')->get();

    view('users/create.view.php', [
        'errors' => $errors,
        'group_name' => $group_name,



    ]);

    exit();
}





$hashed_password = hash('sha256', $_POST['password']);
$db->query('INSERT INTO users(email, password,name,username,group_id,phone,subscribe_at) VALUES(:email, :password,:name, :username, :group_id,:phone, :subscribe_at)', [

    'email' => $email,
    'password' => $hashed_password,
    'name' => $name,
    'username' => $user_name,
    'group_id' => $group_id,
    'phone' => $phone,
    'subscribe_at' => $date
]);


header('location: /users');
exit();
