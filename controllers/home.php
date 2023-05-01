<?php

$appName = 'Webbit';
date_default_timezone_set('Europe/London');
use App\Database\Connection;
use App\Database\QueryBuilder;

function getCategoryTitle($categoryId, QueryBuilder $queryBuilder)
{
    $category = $queryBuilder->findById('category', $categoryId);
    return $category->title;
}

function getUsername($userId, QueryBuilder $queryBuilder)
{
    $user = $queryBuilder->findById('users', $userId);
    return $user->username;
}
function timeSincePosted($datetime, QueryBuilder $queryBuilder)
{
    $now = time();
    $created = strtotime($datetime);
    $diff = $now - $created;
    $units = array(
        'year' => 31536000,
        'month' => 2592000,
        'week' => 604800,
        'day' => 86400,
        'hour' => 3600,
        'minute' => 60,
        'second' => 1
    );
    foreach ($units as $key => $value) {
        if ($diff >= $value) {
            $time = floor($diff / $value);
            $suffix = ($time > 1) ? 's' : '';
            return $time . ' ' . $key . $suffix . ' ago';
        }
    }
    return 'just now';
}

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$categories = $queryBuilder->getAll('category', 'App\Model\Category');

$posts = $queryBuilder->getAllPosts('posts', 'App\Model\Posts');


foreach ($posts as $post) {
    $post->category_id = getCategoryTitle($post->category_id, $queryBuilder);
    $post->user_id = getUsername($post->user_id, $queryBuilder);
    $post->created_in = timeSincePosted($post->created_in, $queryBuilder);
}

require 'views/home.view.php';