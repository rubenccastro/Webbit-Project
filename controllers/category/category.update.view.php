<?php

date_default_timezone_set('Europe/London');
use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$categories = $queryBuilder->getAllAsc('category', 'App\Model\Category');

$requestedCategoryTitle = $category ?? '';


foreach ($categories as $category) {
    $category->category = $queryBuilder->findById('category', $category->id, 'App\Model\Category');
}
$categoryDetails = $queryBuilder->findByColumn('category', 'title', $requestedCategoryTitle, 'App\Model\Category');

require 'views/category.update.view.php';