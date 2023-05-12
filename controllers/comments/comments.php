<?php

date_default_timezone_set('Europe/London');
use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$categories = $queryBuilder->getAllAsc('category', 'App\Model\Category');

$requestedcommentid = $commentid ?? '';

foreach ($categories as $category) {
    $category->category = $queryBuilder->findById('category', $category->id, 'App\Model\Category');
}
$comments = $queryBuilder->findByColumn('comments', 'id', $requestedcommentid, 'App\Model\Category');
$post = $queryBuilder->findById('posts', $comments->post_id);

if (!$_SESSION['userid'] || !$comments->user_id == $_SESSION["userid"]) {
    redirect('');
}
require 'views/comments.update.view.php';