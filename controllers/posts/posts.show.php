<?php

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
$requestedCategoryTitle = $category ?? '';
$categories = $queryBuilder->getAllAsc('category', 'App\Model\Category');

$posts = $queryBuilder->findById('posts', $id, 'App\Model\Posts');


$posts->category = $queryBuilder->findById('category', $posts->category_id, 'App\Model\Category');
$posts->users = $queryBuilder->findById('users', $posts->user_id, 'App\Model\Users');
$posts->created_in = timeSincePosted($posts->created_in, $queryBuilder);
$karmapoints = $queryBuilder->getAll('karmapoints', 'App\Model\Karmapoints');

$categoryDetails = $queryBuilder->findByColumn('category', 'title', $requestedCategoryTitle, 'App\Model\Category');
require 'views/posts.show.view.php';