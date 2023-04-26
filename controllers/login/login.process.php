<?php
use App\Model\Users;
use App\Database\Connection;
use App\Database\QueryBuilder;

$username = trim($_POST['user']);
$pwd = ($_POST['password']);

// Create a connection and QueryBuilder instance
$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

if (isset($_POST["submit"])) {
    /* Grabbing the data */
    $username = $_POST["user"];
    $pwd = $_POST["password"];

    /* Running error handlers and user signup */
    if (empty($username) || empty($pwd)) {
        header("location: index.php?error=emptyinput");
        exit();
    }

    $queryBuilder->getUsers($username, $pwd);

    /* Going to back to front page */
    redirect('');
}