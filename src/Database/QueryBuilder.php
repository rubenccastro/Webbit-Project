<?php
namespace App\Database;

use Connection;
use \PDO;

class QueryBuilder
{
    private $pdo;
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    public function getAll($table, $class = "StdClass")
    {
        $stmt = $this->pdo->prepare("SELECT * FROM $table ORDER BY $table.id ASC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, $class);
    }
    public function deleteById($table, $id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM $table WHERE id=:id");
        $stmt->execute(['id' => $id]);
        return $stmt->rowCount() == 1;
    }
    public function create($table, $attributes)
    {
        $stmt = $this->pdo->prepare("INSERT INTO $table (" .
            implode(",", array_keys($attributes)) .
            ") VALUES (:" . implode(', :', array_keys($attributes)) . ")");
        $stmt->execute($attributes);
    }
    public function update($table, $id, $attributes)
    {
        $query = "UPDATE $table SET ";
        foreach ($attributes as $key => $attribute)
            $query .= "$key=:$key,";
        $query = rtrim($query, ",");
        $query .= ' WHERE id=:id';
        $attributes['id'] = $id;
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($attributes);
        return $stmt->rowCount() == 1;
    }

    public function getUsers($username, $pwd)
    {
        $stmt = $this->pdo->prepare('SELECT pwd FROM users WHERE username = ?');

        if (!$stmt->execute(array($username))) {
            $stmt = null;
            header("location: index.php?error=stmtfailed");
            exit();
        }

        $passHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($passHashed) == 0) {
            $stmt = null;
            header("location: index.php?error=usernotfound");
        }

        $checkPass = password_verify($pwd, $passHashed[0]["pwd"]);

        if ($checkPass == false) {
            $stmt = null;
            header("location: index.php?error=wrongpassword");
            exit();
        } elseif ($checkPass == true) {
            $stmt = $this->pdo->prepare('SELECT * FROM users WHERE username = ? AND pwd = ?;');

            if (!$stmt->execute(array($username, $passHashed[0]['pwd']))) {
                $stmt = null;
                header("location: index.php?error=stmtfailed");
                exit();
            }

            $username = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (count($username) == 0) {
                $stmt = null;
                header("location: index.php?error=usernotfound");
                exit();
            }

            $_SESSION["userid"] = $username[0]["id"];
            $_SESSION["username"] = $username[0]["username"];

            $stmt = null;
        }
    }
    public function findById($table, $id, $class = "StdClass")
    {
        $stmt = $this->pdo->prepare("SELECT * FROM $table WHERE id=:id");
        $stmt->setFetchMode(PDO::FETCH_CLASS, $class);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }
}