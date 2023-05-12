<?php
use App\Model\Users;
use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$user = $queryBuilder->findByColumn('users', 'username', $_POST['user'], "StdClass");

if (empty($_POST['user']) || empty($_POST['password'])) {
    $_SESSION['message'] = "Fill in all the inputs";
    redirect('login');
    exit();
} elseif (!$user) {
    $_SESSION['message'] = "Make sure your username or password is correct!";
    redirect('login');
    exit();
} else {
    if (!password_verify($_POST['password'], $user->pwd)) {
        $_SESSION['message'] = "Make sure your username or password is correct!";
        redirect('login');
        exit();
    } else {
        $_SESSION["userid"] = $user->id;
        $_SESSION["username"] = $user->username;

        redirect('');
    }
}