<?php

class FormModel
{
    // Register User
    public static function getRegister($id, $name, $email, $password)
    {
        $stmt = Database::connect()->prepare("INSERT INTO users (id, name, email, password) VALUES(:id, :name, :email, :password)");
        $stmt->bindParam(":id", $id, PDO::PARAM_STR_CHAR);
        $stmt->bindParam(":name", $name, PDO::PARAM_STR);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->bindParam(":password", $password, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return 1;
        } else {
            return "error";
        }
    }
    // Validate Email for register
    public static function matchEmail($email)
    {
        $stmt = Database::connect()->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
        $stmt = null;
    }
    // Login User
    public static function getLogin($email, $password)
    {
        $stmt = Database::connect()->prepare("SELECT * FROM users WHERE email = :email and password = :password");
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->bindParam(":password", $password, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
        $stmt = null;
    }
}