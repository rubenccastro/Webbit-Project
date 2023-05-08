<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);


$input_desc = $_POST['description'];
$category_id = $_POST['category_id'] ?? '';
$category = $queryBuilder->findById('category', $category_id);
if(empty($input_desc)){
    $_SESSION['message'] = "Make sure you type something in the textbox!";
    redirect('w/' . $category->title . "/edit");
    exit();
}else{
    if (strlen($input_desc) > 500) {
        echo "Description is too long - please enter no more than 500 characters.";
    } else {
        $queryBuilder->update('category', $category_id, ['description' => $input_desc]);
    }
    redirect('w/' . $category->title);
}
    