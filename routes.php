<?php


$router->get('/login', 'login/index.php');
$router->post('/login', 'login/store.php');
$router->get('/logout', 'login/destroy.php');

$router->get('/', 'index.php')->only(['remembered']);

//groups-routes
$router->get('/groups', 'groups/index.php')->only(['remembered']);
$router->get('/groups/create', 'groups/create.php')->only(['remembered']);
$router->get('/group/edit', 'groups/edit.php')->only(['remembered']);
$router->put('/group', 'groups/update.php')->only(['remembered']);
$router->post('/groups', 'groups/store.php')->only(['remembered']);
$router->delete('/group', 'groups/destroy.php')->only(['remembered']);

//users-routes
$router->get('/users', 'users/index.php')->only(['remembered']);
$router->get('/users/create', 'users/create.php')->only(['remembered']);
$router->post('/users/store', 'users/store.php')->only(['remembered']);
$router->get('/users/edit', 'users/edit.php')->only(['remembered']);
$router->put('/users/update', 'users/update.php')->only(['remembered']);
$router->delete('/destroy', 'users/destroy.php')->only(['remembered']);

//articles-routes
$router->get('/articles', 'articles/index.php')->only(['remembered']);
$router->get('/article', 'articles/show.php')->only(['remembered']);
$router->post('/article', 'articles/store.php')->only(['remembered']);
$router->get('/article/create', 'articles/create.php')->only(['remembered']);
$router->delete('/article', 'articles/destroy.php')->only(['remembered']);
