<?php

class NotesModel
{

    public static function addNote($id, $title, $desc, $color, $user_id)
    {
        $stmt = Database::connect()->prepare("INSERT INTO notes (id, title, description, color, user_id) VALUES (:id, :title, :description, :color, :user_id)");
        $stmt->bindParam(":id", $id, PDO::PARAM_STR);
        $stmt->bindParam(":title", $title, PDO::PARAM_STR);
        $stmt->bindParam(":description", $desc, PDO::PARAM_STR);
        $stmt->bindParam(":color", $color, PDO::PARAM_STR);
        $stmt->bindParam(":user_id", $user_id, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return 1;
        } else {
            return 0;
        }
        $stmt = null;
    }

    public static function selectNotes($user_id)
    {
        $stmt = Database::connect()->prepare("SELECT * FROM notes WHERE user_id = :user_id ORDER BY date DESC");
        $stmt->bindParam(":user_id", $user_id, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }

    public static function deleteNote($id)
    {
        $stmt = Database::connect()->prepare("DELETE FROM notes WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return 1;
    }
}