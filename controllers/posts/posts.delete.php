<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$category_id = $_POST['category_id'] ?? '';
$comment_id = $_POST['comment_id'] ?? '';
$post_id = $_POST['post_id'] ?? '';

$posts = $queryBuilder->findById('posts', $post_id);
$category = $queryBuilder->findById('category', $category_id);

if (!$_SESSION['userid']) {
    redirect('');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($posts->user_id == ($_SESSION["userid"])) {
        $queryBuilder->deleteByColumn('comments', 'post_id', $post_id);
        $queryBuilder->deleteByColumn('karmapoints', 'posts_id', $post_id);
        $queryBuilder->deleteById('posts', $post_id);
    }
}


redirect('w/' . $category->title);