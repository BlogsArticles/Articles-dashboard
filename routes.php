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

//users-routes
$router->get('/users', 'users/index.php');
$router->get('/users/create', 'users/create.php');
$router->post('/users/store', 'users/store.php');
$router->get('/users/edit', 'users/edit.php');
$router->put('/users/update', 'users/update.php');
$router->delete('/destroy', 'users/destroy.php');


/**update `groups` set is_deleted= :date where id= :i */
/**select * from `groups` where is_deleted is null */
$router->get('/articles', 'articles/index.php');
$router->get('/article', 'articles/show.php');
$router->post('/article', 'articles/store.php');
$router->get('/article/create', 'articles/create.php');
$router->delete('/article', 'articles/destroy.php');
