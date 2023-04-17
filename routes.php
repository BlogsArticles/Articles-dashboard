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

// $router->get('/login', 'session/create.php')->only('guest');
// $router->post('/session', 'session/store.php')->only('guest');
// $router->delete('/session', 'session/destroy.php')->only('auth');


$router->get('/groups', 'groups/index.php');
$router->get('/groups/create', 'groups/create.php');
$router->get('/group/edit', 'groups/edit.php');
$router->get('/group', 'groups/show.php');
$router->put('/group', 'groups/update.php');
$router->post('/groups', 'groups/store.php');
$router->delete('/group', 'groups/destroy.php');
$router->get('/login', 'login/index.php');
$router->post('/login', 'login/store.php');
$router->get('/logout', 'login/destroy.php');

$router->get('/login', 'session/create.php')->only('guest');
$router->post('/session', 'session/store.php')->only('guest');
$router->delete('/session', 'session/destroy.php')->only('auth');

$router->get('/articles', 'articles/index.php');
$router->get('/article', 'articles/show.php');
$router->post('/article', 'articles/store.php');
$router->get('/article/create', 'articles/create.php');
$router->delete('/article', 'articles/destroy.php');
