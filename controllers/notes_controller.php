<?php

class NotesController
{
    public static function getNote()
    {
        $PATTERN_FIELDS = "/^[a-zñÑA-ZáéíóúÁÉÍÓÚÜ ]+$/";

        if (isset($_POST["submit"])) {
            $title = $_POST["title"];
            $desc = $_POST["description"];
            $color = $_POST["color"];
            $user_id = $_POST["user_id"];
            $id = md5($title . "+" . $user_id);

            if (
                preg_match($PATTERN_FIELDS, $title) &&
                preg_match($PATTERN_FIELDS, $desc)
            ) {
                $res = NotesModel::addNote($id, $title, $desc, $color, $user_id);
                return $res;
            } else {
                return "invalid_characters";
            }
        }
    }

    public static function showNotes($user_id)
    {
        $res = NotesModel::selectNotes($user_id);
        return $res;
    }

    public static function deleteNote()
    {
        if (isset($_POST["delete"])) {
            $id = $_POST["id"];
            $res = NotesModel::deleteNote($id);
            return $res;
        }
    }
}