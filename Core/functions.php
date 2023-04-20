<?php

use Core\Response;

use Core\Authentication;

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function abort($code = 404)
{
    http_response_code($code);

    require base_path("views/{$code}.php");

    die();
}

function authorize($condition, $status = Response::FORBIDDEN)
{
    if (! $condition) {
        abort($status);
    }

    return true;
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);

    require base_path('views/' . $path);
}

function redirect($path)
{
    header("location: {$path}");
    exit();
}

function rememberValue($value)
{

    if (isset($_POST[$value]) && !empty($_POST[$value])) {

        return $_POST[$value];

    }
}


function has_role($role)
{
    if (Authentication::user()["group_id"] === Authentication::getRoles($role)) {
        return true;
    }

    return false;
}
