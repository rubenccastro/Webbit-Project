<?php

$appName = 'Webbit';
date_default_timezone_set('Europe/London');
use App\Database\Connection;
use App\Database\QueryBuilder;

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

$categories = $queryBuilder->getAllAsc('category', 'App\Model\Category');

$posts = $queryBuilder->getAllPosts('posts', 'App\Model\Posts');

foreach ($categories as $category) {
    $category->category = $queryBuilder->findById('category', $category->id, 'App\Model\Category');
}
foreach ($posts as $post) {
    $post->category = $queryBuilder->findById('category', $post->category_id, 'App\Model\Category');
    $post->users = $queryBuilder->findById('users', $post->user_id, 'App\Model\Users');
    $post->created_in = timeSincePosted($post->created_in, $queryBuilder);
}

$karmapoints = $queryBuilder->getAll('karmapoints', 'App\Model\Karmapoints');
require 'views/home.view.php';