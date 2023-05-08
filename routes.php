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
    require 'controllers/category/category.create.view.php';
});

$router->post('category', function () {
    require 'controllers/category/category.create.php';
});

$router->get('w/([\w\-]+)', function ($category) {
    require 'controllers/category/category.view.php';
});

$router->get('w/([\w\-]+)/edit', function ($category) {
    require 'controllers/category/category.update.view.php';
});
$router->post('category/edit', function () {
    require 'controllers/category/category.update.php';
});


$router->get('w/([\w\-]+)/(\d+)/edit', function ($category, $id) {
    require 'controllers/posts/posts.update.view.php';
});

$router->get('posts/create', function () {
    require 'controllers/posts/posts.php';
});

$router->post('posts', function () {
    require 'controllers/posts/posts.create.php';
});

$router->post('posts/edit', function () {
    require 'controllers/posts/posts.update.php';
});
$router->post('posts/delete', function () {
    require 'controllers/posts/posts.delete.php';
});

$router->get('w/([\w\-]+)/(\d+)', function ($category, $id) {
    require 'controllers/posts/posts.show.php';
});

$router->get('w/([\w\-]+)/(\d+)/comment/(\d+)/edit', function ($category, $id, $commentid) {
    require 'controllers/comments/comments.php';
});

$router->post('comment/create', function () {
    require 'controllers/comments/comments.create.php';
});

$router->post('comment/edit', function () {
    require 'controllers/comments/comments.update.php';
});

$router->post('comment/delete', function () {
    require 'controllers/comments/comments.delete.php';
});


$router->post('karma', function () {
    require 'controllers/karmapoints/karma.php';
});