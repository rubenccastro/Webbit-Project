<?php
use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$categories = $queryBuilder->getAll('category', 'App\Model\Category');

foreach ($categories as $category) {
    $category->category = $queryBuilder->findById('category', $category->id, 'App\Model\Category');
}
require 'views/category.create.view.php';