<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$queryBuilder->create('posts', [
    'title' => $_POST['title'],
    'text' => $_POST['text'],
    'user_id' => $_SESSION["userid"],
    'category_id' => $_POST['category_id']
]);
$categories = $queryBuilder->getAllAsc('category', 'App\Model\Category');

foreach ($categories as $category) {
    $category->category = $queryBuilder->findById('category', $category->id, 'App\Model\Category');
}

redirect('');