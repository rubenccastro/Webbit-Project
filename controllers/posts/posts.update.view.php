<?php

date_default_timezone_set('Europe/London');
use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$categories = $queryBuilder->getAllAsc('category', 'App\Model\Category');

$requestedpostid = $id ?? '';


foreach ($categories as $category) {
    $category->category = $queryBuilder->findById('category', $category->id, 'App\Model\Category');
}
$posts = $queryBuilder->findByColumn('posts', 'id', $requestedpostid, 'App\Model\Posts');

if (!$_SESSION['userid'] || !$posts->user_id == $_SESSION["userid"]) {
    redirect('');
}
require 'views/posts.update.view.php';