<?php

$router->get('/', 'index.php')->only(['remembered','auth']);
$router->get('/about', 'about.php')->only(['remembered','auth']);
$router->get('/contact', 'contact.php')->only(['remembered','auth']);

$router->get('/notes', 'notes/index.php')->only(['remembered','auth']);
$router->get('/note', 'notes/show.php')->only(['remembered','auth']);
$router->delete('/note', 'notes/destroy.php')->only(['remembered','auth']);

$router->get('/note/edit', 'notes/edit.php')->only(['remembered','auth']);
$router->patch('/note', 'notes/update.php')->only(['remembered','auth']);

$router->get('/notes/create', 'notes/create.php')->only(['remembered','auth']);
$router->post('/notes', 'notes/store.php')->only(['remembered','auth']);

$router->get('/register', 'registration/create.php')->only('guest')->only(['remembered','auth']);
$router->post('/register', 'registration/store.php')->only('guest')->only(['remembered','auth']);

$router->get('/login', 'login/index.php');
$router->post('/login', 'login/store.php');
$router->get('/logout', 'login/destroy.php');

