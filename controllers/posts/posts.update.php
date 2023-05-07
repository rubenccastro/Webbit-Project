<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);


$input_desc = $_POST['text'];
$post_id= $_POST['post_id'] ?? '';
$category= $_POST['category_id'] ?? '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $category = $queryBuilder->findById('category', $category);
        $post = $queryBuilder->findById('posts', $post_id);
        $queryBuilder->update('posts', $post_id, ['text' => $input_desc]);
}
redirect('w/' . $category->title . '/' . $post_id);