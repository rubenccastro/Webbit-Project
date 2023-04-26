<?php

$appName = 'Webbit';

use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$categories = $queryBuilder->getAll('category', 'App\Model\Category');

require 'views/home.view.php';