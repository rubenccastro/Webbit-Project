<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input_text = $_POST['category'];
    if (strlen($input_text) > 16) { // Input is too long - handle the error     
        echo "Input is too long - please enter no more than 16 characters."; // Alternatively, you can redirect the user back to the form with an error message   
    } else {
        $queryBuilder->create('category', [
            'title' => $_POST['category']
        ]);
    }
}
redirect('');