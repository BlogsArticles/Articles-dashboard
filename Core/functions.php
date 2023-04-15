<?php

use Core\Response;

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

// Using this estimate, the average number of characters in a 9-word string
// would be approximately 45 characters (9 words x 5 characters per word)
// The average title length is around 60 characters and for a summary is around 150-200 characters
function resizeStingAndAppend ($mainText , $textToAppend = '...', $maxSize = 45) : string {
    $myNewString = $mainText;
    if ( strlen($mainText) > $maxSize ) {
        $myNewString = substr($mainText,0,$maxSize);
        $myNewString= $myNewString.$textToAppend;
    }
    return  $myNewString;
}