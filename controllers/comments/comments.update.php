<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$input_desc = $_POST['description'];
$comment_id = $_POST['comments_id'] ?? '';

$comment = $queryBuilder->findById('comments', $comment_id);
$post = $queryBuilder->findById('posts', $comment->post_id);
$category = $queryBuilder->findById('category', $post->category_id);

if(empty($input_desc)){
    $_SESSION['message'] = "Make sure to fill in the textbox!";
    redirect('w/' . $category->title . '/' . $comment->post_id . "/comment/" . $comment_id . "/edit" );
    exit();
} else {
    $queryBuilder->update('comments', $comment_id, ['text' => $input_desc]);
    redirect('w/' . $category->title . '/' . $comment->post_id);
}
