<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$categories = $queryBuilder->getAllAsc('category', 'App\Model\Category');

foreach ($categories as $category) {
    $category->category = $queryBuilder->findById('category', $category->id, 'App\Model\Category');
}


if (empty($_POST['title']) || empty($_POST['text'] || empty($_POST['category_id']))) {
    $_SESSION['message'] = "Make sure the inputs are filled!";
    redirect('posts/create');
    exit();
} else {
    $category = $queryBuilder->findById('category', $_POST['category_id'], 'App\Model\Category');
    if ($category < 1) {
        $_SESSION['message'] = "Make sure there's a category selected!";
        redirect('posts/create');
        exit();
    }
    $queryBuilder->create('posts', [
        'title' => $_POST['title'],
        'text' => $_POST['text'],
        'user_id' => $_SESSION["userid"],
        'category_id' => $_POST['category_id']
    ]);
    redirect('');
}