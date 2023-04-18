<?php

$router->get('/', 'index.php')->only(['remembered']);
$router->get('/about', 'about.php')->only(['remembered']);
$router->get('/contact', 'contact.php')->only(['remembered']);

$router->get('/notes', 'notes/index.php')->only(['remembered']);
$router->get('/note', 'notes/show.php')->only(['remembered']);
$router->delete('/note', 'notes/destroy.php')->only(['remembered']);

$router->get('/note/edit', 'notes/edit.php')->only(['remembered']);
$router->patch('/note', 'notes/update.php')->only(['remembered']);

$router->get('/notes/create', 'notes/create.php')->only(['remembered']);
$router->post('/notes', 'notes/store.php')->only(['remembered']);

$router->get('/register', 'registration/create.php')->only('guest')->only(['remembered']);
$router->post('/register', 'registration/store.php')->only('guest')->only(['remembered']);

$router->get('/groups', 'groups/index.php')->only(['remembered']);
$router->get('/groups/create', 'groups/create.php')->only(['remembered']);
$router->get('/group/edit', 'groups/edit.php')->only(['remembered']);
$router->put('/group', 'groups/update.php')->only(['remembered']);
$router->post('/groups', 'groups/store.php')->only(['remembered']);
$router->delete('/group', 'groups/destroy.php')->only(['remembered']);

$router->get('/login', 'login/index.php');
$router->post('/login', 'login/store.php');
$router->get('/logout', 'login/destroy.php');

