<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);


$input_desc = $_POST['description'];
$category_id = $_POST['category_id'] ?? '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (strlen($input_desc) > 500) {
        echo "Description is too long - please enter no more than 500 characters.";
    } else {
        $queryBuilder->update('category', $category_id, ['description' => $input_desc]);
    }
}
redirect('');