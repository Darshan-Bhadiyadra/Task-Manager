<?php
class Database
{
    private mysqli|false $_connection;

    //Create Construct Function For Database Connection
    public function __construct()
    {
        $this->_connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    }

    public function selectQuery(string $tableName, $columns = '*', $where = '1 = 1'): mysqli_result|bool
    {
        $sql = "SELECT $columns FROM $tableName WHERE $where";
        return mysqli_query($this->_connection, $sql);
    }

    public function insertQuery(string $tableName, array $columns, array $values): mysqli_result|bool
    {
        $sql = "INSERT INTO $tableName (" . implode(',', $columns) . ") VALUES ('" . implode("', '", $values) . "')";
        return mysqli_query($this->_connection, $sql);
    }

    public function getQuery(string $tableName, $columns, $where = '1 = 1'): mysqli_result|bool
    {
        $sql = "SELECT $columns FROM $tableName WHERE $where";
        return mysqli_query($this->_connection, $sql);
    }

    public function updateQuery($tableName, $columns, $where = '1 = 1'): mysqli_result|bool
    {
        $sql = "UPDATE $tableName SET " . implode(',', $columns) . " WHERE $where";
        echo $sql;
        return mysqli_query($this->_connection, $sql);
    }

    public function deleteQuery($tableName, $where = '1 = 1'): mysqli_result|bool
    {
        $sql = "DELETE FROM $tableName WHERE $where";
        return mysqli_query($this->_connection, $sql);
    }
}