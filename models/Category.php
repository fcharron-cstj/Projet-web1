<?php

namespace Models;

use Bases\Model;

class Category extends Model
{
    protected $table = "categories";

    public function getCategories()
    {
        $sql = "SELECT $this->table.*
                    FROM $this->table";

        $requete = $this->pdo()->prepare($sql);

        $requete->execute();

        return $requete->fetchAll();
    }

    public function getSections()
    {
        $sql = "SELECT sections.*
        FROM sections";

        $requete = $this->pdo()->prepare($sql);

        $requete->execute();

        return $requete->fetchAll();
    }

    public function storeSection($title)
    {
        $sql = "INSERT INTO sections
        (title)
        VALUES (:title)";

        $requete = $this->pdo()->prepare($sql);

        return $requete->execute([
            ":title" => $title,
        ]);
    }

    public function deleteSection($id)
    {
        $sql = "DELETE FROM sections
                WHERE id = :id";

        $requete = $this->pdo()->prepare($sql);

        return $requete->execute([
            ":id" => $id,
        ]);
    }

    public function modifySection($id, $title)
    {
        $sql = "UPDATE sections
        SET title = :title
        WHERE id=:id";

        $requete = $this->pdo()->prepare($sql);

        return $requete->execute([
            ":id" => $id,
            ":title" => $title,
        ]);
    }
}