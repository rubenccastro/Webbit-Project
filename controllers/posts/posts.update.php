<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$input_desc = $_POST['text'];
$post_id = $_POST['post_id'] ?? '';
$category_id = $_POST['category_id'] ?? '';

if (empty($input_desc)) {
    $categoryfind = $queryBuilder->findById('category', $category_id);
    $_SESSION['message'] = "Make sure you type something in the textbox!";
    redirect('w/' . $categoryfind->title . '/' . $post_id . "/edit");
    exit();
} else {
    $categoryfind = $queryBuilder->findById('category', $category_id);
    $queryBuilder->update('posts', $post_id, ['text' => $input_desc]);
    redirect('w/' . $categoryfind->title . '/' . $post_id);
}