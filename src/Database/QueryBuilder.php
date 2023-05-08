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
        $stmt = $this->pdo->prepare("SELECT * FROM $table");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, $class);
    }

    public function getAllAsc($table, $class = "StdClass")
    {
        $stmt = $this->pdo->prepare("SELECT * FROM $table ORDER BY $table.id ASC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, $class);
    }
    public function getAllPosts($table, $class = "StdClass")
    {
        $stmt = $this->pdo->prepare("SELECT * FROM $table ORDER BY $table.id DESC");
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
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE username = ?');
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($user && password_verify($pwd, $user["pwd"])) {
            $_SESSION["userid"] = $user["id"];
            $_SESSION["username"] = $user["username"];
        } else {
            exit();
        }
    }
    public function findById($table, $id, $class = "StdClass")
    {
        $stmt = $this->pdo->prepare("SELECT * FROM $table WHERE id=:id");
        $stmt->setFetchMode(PDO::FETCH_CLASS, $class);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }
    public function selectOne($table, $user_id_column, $user_id, $post_id_column, $post_id)
    {
        $sql = "SELECT * FROM {$table} WHERE {$user_id_column} = :user_id AND {$post_id_column} = :post_id LIMIT 1";

        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $statement->bindParam(':post_id', $post_id, PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_OBJ);
    }

    public function delete($table, ...$conditions)
    {
        $sql = "DELETE FROM $table WHERE ";

        $params = [];

        for ($i = 0; $i < count($conditions); $i += 2) {
            $column = $conditions[$i];
            $value = $conditions[$i + 1];
            $sql .= "$column = ? AND ";
            $params[] = $value;
        }

        $sql = rtrim($sql, "AND ");

        $statement = $this->pdo->prepare($sql);

        $statement->execute($params);

        return $statement->rowCount();
    }
    public function updateWithCompositeKey($table, $key1, $value1, $key2, $value2, $attributes, $extraAttributes = [])
    {
        $query = "UPDATE {$table} SET ";
        foreach ($attributes as $key => $attribute) {
            $query .= "{$key}=:{$key},";
        }

        foreach ($extraAttributes as $key => $attribute) {
            $query .= "{$key}=:{$key},";
            $attributes[$key] = $attribute;
        }

        $query = rtrim($query, ",");
        $query .= " WHERE {$key1}=:{$key1}_value AND {$key2}=:{$key2}_value";

        $attributes[$key1 . '_value'] = $value1;
        $attributes[$key2 . '_value'] = $value2;

        $stmt = $this->pdo->prepare($query);
        $stmt->execute($attributes);
        return $stmt->rowCount() == 1;
    }

    public function findByColumn($table, $column, $value, $intoClass)
    {
        $statement = $this->pdo->prepare("SELECT * FROM {$table} WHERE {$column} = :value LIMIT 1");
        $statement->bindValue(':value', $value);
        $statement->execute();
        return $statement->fetchObject($intoClass);
    }

    public function getByColumn($table, $column, $value, $intoClass)
    {
        $statement = $this->pdo->prepare("SELECT * FROM {$table} WHERE {$column} = :value ORDER BY $table.id DESC");
        $statement->bindValue(':value', $value);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS, $intoClass);
    }
    public function deleteByColumn($table, $column, $value) {
        $sql = "DELETE FROM {$table} WHERE {$column} = :value";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':value', $value);
        $statement->execute();
    }
}