<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);


$input_desc = $_POST['description'];
$category_id = $_POST['category_id'] ?? '';
$comment_id = $_POST['comments_id'] ?? '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $category = $queryBuilder->findById('category', $category_id);
        $queryBuilder->update('comments', $comment_id, ['text' => $input_desc]);
        $comment = $queryBuilder->findById('comments', $comment_id);
}
redirect('w/' . $category->title . '/' . $comment->post_id);