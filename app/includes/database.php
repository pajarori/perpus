<?php

class Database
{

    private static $instance;
    private $conn, $query, $count = 0, $result, $error;

    private function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=localhost;dbname=perpus", "root", "");
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function query($sql, $params = [])
    {
        $this->error = false;
        if ($this->query = $this->conn->prepare($sql)) {
            $x = 1;
            if (count($params)) {
                foreach ($params as $param) {
                    $this->query->bindValue($x, $param);
                    $x++;
                }
            }

            if ($this->query->execute()) {
                $this->result = $this->query->fetchAll(PDO::FETCH_OBJ);
                $this->count = $this->query->rowCount();
            } else {
                $this->error = true;
            }
        }

        return $this;
    }

    public function insert($table, $fields = [])
    {
        $keys = array_keys($fields);
        $values = null;
        $x = 1;

        foreach ($fields as $field) {
            $values .= "?";
            if ($x < count($fields)) {
                $values .= ", ";
            }
            $x++;
        }

        $sql = "INSERT INTO {$table} (`" . implode('`, `', $keys) . "`) VALUES ({$values})";

        if (!$this->query($sql, $fields)->error()) {
            return true;
        }
        return false;
    }

    public function update($table, $id, $fields)
    {
        $set = '';
        $x = 1;

        foreach ($fields as $name => $value) {
            $set .= "{$name} = ?";
            if ($x < count($fields)) {
                $set .= ', ';
            }
            $x++;
        }

        $sql = "UPDATE {$table} SET {$set} WHERE id = {$id}";

        if (!$this->query($sql, $fields)->error()) {
            return true;
        }
        return false;
    }

    public function delete($table, $id)
    {
        $sql = "DELETE FROM {$table} WHERE id = {$id}";

        if (!$this->query($sql)->error()) {
            return true;
        }
        return false;
    }

    public function result()
    {
        return $this->result;
    }

    public function first()
    {
        return $this->result()[0];
    }

    public function error()
    {
        return empty($this->error) ? false : true;
    }

    public function count()
    {
        return $this->count;
    }
}
