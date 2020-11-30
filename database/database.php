<?php

class Database
{

    static public function connect()
    {
        $URI = "mysql:host=localhost;dbname=notes-app";
        $USER = "root";
        $PW = "";
        try {
            $connection = new PDO($URI, $USER, $PW);
            $connection->exec("set names utf8");
            // print_r($connection);
            return $connection;
        } catch (PDOException $e) {
            throw $e->getMessage();
        }
    }
}