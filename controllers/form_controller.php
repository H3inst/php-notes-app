<?php

class FormController
{

    public static function getRegister()
    {
        $PATTERN_NAME = "/^[a-zñÑA-ZáéíóúÁÉÍÓÚÜ ]+$/";
        $PATTERN_EMAIL = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/";
        $PATTERN_PASSWORD = "/^[0-9a-zA-Z]+$/";

        if (isset($_POST["submit"])) {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $confirm_password = $_POST["confirm_password"];
            $id = md5($name . "+" . $email);
            $salt = '$2a$07$jhGjkgbkJJjkYUYTYYJbuByuHtgdfy$';
            $encrypt_password = crypt($password, $salt);
            $match_email = FormModel::matchEmail($email);

            if (
                preg_match($PATTERN_NAME, $name) &&
                preg_match($PATTERN_EMAIL, $email) &&
                preg_match($PATTERN_PASSWORD, $password)
            ) {

                if ($password != $confirm_password) {
                    return "password_do_not_match";
                }
                if ($match_email) {
                    if ($match_email["email"] == $email) {
                        return "invalid_email";
                    }
                }
                $res = FormModel::getRegister($id, $name, $email, $encrypt_password);
                return $res;
            } else {
                return "invalid_character";
            }
        }
    }

    public static function userLogin()
    {
        if (isset($_POST["submit"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];

            $salt = '$2a$07$jhGjkgbkJJjkYUYTYYJbuByuHtgdfy$';
            $encrypt_password = crypt($password, $salt);

            $res = FormModel::getLogin($email, $encrypt_password);
            if ($res && $res["email"] == $email && $res["password"] == $encrypt_password) {
                $_SESSION["isLogged"] = 1;
                $_SESSION["user"] = $res["name"];
                $_SESSION["id"] = $res["id"];
                header("Location: home");
            } else {
                return "invalid_login";
            }
        }
    }
}