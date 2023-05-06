<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);
$category_id = $_POST['category_id'] ?? '';
$category = $queryBuilder->findById('category', $category_id);
$post_id = $_POST['post_id'] ?? '';
        $queryBuilder->create('comments', [
            'text' => $_POST['text'],
            'user_id' => $_SESSION["userid"],
            'post_id' => $_POST['post_id']
        ]);
        
redirect('w/' . $category->title . '/' . $post_id);