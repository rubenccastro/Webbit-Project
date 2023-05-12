<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);


$input_text = $_POST['category'];
$input_desc = $_POST['description'];
$category = $queryBuilder->findByColumn('category', 'title', $_POST['category'], "StdClass");
if (!$_SESSION['userid']) {
    redirect('');
}
elseif (empty($input_text || $input_desc)) {
    $_SESSION['message'] = "Make sure the inputs are filled!";
    redirect('category');
    exit();
} elseif ($category) {
    $_SESSION['message'] = "Make sure the category doesn't exist!";
    redirect('category');
    exit();
} else {
    if (strlen($input_text) > 16 && strlen($input_desc) > 500) {
        $_SESSION['message'] = "Make sure the category name has less than 16 characters and the description less than 500 characters.";
    } else {
        $queryBuilder->create('category', [
            'title' => $_POST['category'],
            'description' => $_POST['description'],
            'user_id' => $_SESSION["userid"]
        ]);
    }
    redirect('');
}