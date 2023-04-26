<?php

/* home page */
$router->get('', function () {
    require 'controllers/home.php';
});

$router->get('login', function () {
    require 'controllers/login/login.php';
});

$router->post('login', function () {
    require 'controllers/login/login.process.php';
});

$router->get('register/create', function () {
    require 'controllers/register/register.create.php';
});

$router->post('register', function () {
    require 'controllers/register/register.store.php';
});

$router->get('logout', function () {
    require 'controllers/logout.php';
});


$router->get('category', function () {
    require 'controllers/category/category.php';
});

$router->post('category', function () {
    require 'controllers/category/category.create.php';
});

$router->get('posts/create', function () {
    require 'controllers/posts/posts.php';
});

$router->post('posts', function () {
    require 'controllers/posts/posts.create.php';
});