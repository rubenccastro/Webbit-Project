<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input_text = $_POST['category'];
    $input_desc = $_POST['description'];
    if (strlen($input_text) > 16 && strlen($input_desc) > 500) {
        echo "Input is too long - please enter no more than 16 characters.";
        echo "Description is too long - please enter no more than 500 characters.";
    } else {
        $queryBuilder->create('category', [
            'title' => $_POST['category'],
            'description' => $_POST['description'],
            'user_id' => $_SESSION["userid"]
        ]);
    }
}
redirect('');