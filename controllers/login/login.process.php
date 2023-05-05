<?php
use App\Model\Users;
use App\Database\Connection;
use App\Database\QueryBuilder;

$username = trim($_POST['user']);
$pwd = ($_POST['password']);

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

if (isset($_POST["submit"])) {
    $username = $_POST["user"];
    $pwd = $_POST["password"];

    if (empty($username) || empty($pwd)) {
        header("location: index.php?error=emptyinput");
        exit();
    }

    $queryBuilder->getUsers($username, $pwd);

    redirect('');
}