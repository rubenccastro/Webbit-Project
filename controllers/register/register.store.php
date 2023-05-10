<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);
$categories = $queryBuilder->getAllAsc('category', 'App\Model\Category');
$username = $queryBuilder->findByColumn('users', 'username', $_POST['user'], "StdClass");
$email = $queryBuilder->findByColumn('users', 'email', $_POST['email'], "StdClass");

foreach ($categories as $category) {
   $category->category = $queryBuilder->findById('category', $category->id, 'App\Model\Category');
}
if (empty($_POST['user']) || empty($_POST['password']) || empty($_POST['confirmpassword']) || empty($_POST['email'])) {
   $_SESSION['message'] = "Fill in all the inputs";
   redirect('register/create');
   exit();
} elseif ($username || $email) {
   $_SESSION['message'] = "Make sure your username or email is not already in use!";
   redirect('register/create');
   exit();
} elseif ($_POST['password'] !== $_POST['confirmpassword']) {
   $_SESSION['message'] = "Make sure your password matches!";
   redirect('register/create');
   exit();
} else {
   $queryBuilder->create('users', [
      'username' => trim($_POST['user']),
      'pwd' => password_hash($_POST['password'], PASSWORD_DEFAULT),
      'email' => $_POST['email']
   ]);
   redirect('');
}