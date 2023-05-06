<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$category_id = $_POST['category_id'] ?? '';
$comment_id = $_POST['comment_id'] ?? '';
$post_id = $_POST['post_id'] ?? '';

$comment = $queryBuilder->findById('comments', $comment_id);
$category = $queryBuilder->findById('category', $category_id);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if($comment->user_id == ($_SESSION["userid"])){
        $queryBuilder->deleteById('comments', $comment_id);
    }
}
redirect('w/' . $category->title . '/' . $post_id);