<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$queryBuilder->create('users', [
    'username' => $_POST['user'],
    'pwd' => password_hash($_POST['password'], PASSWORD_DEFAULT),
    'email' => $_POST['email']
]);
$categories = $queryBuilder->getAll('category', 'App\Model\Category');
redirect('');