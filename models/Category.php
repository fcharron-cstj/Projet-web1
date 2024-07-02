<?php

namespace Models;

use Bases\Model;

class Category extends Model
{
    protected $table = "categories";

    /**
     * Returns every category
     *
     * @return object
     */
    public function getCategories()
    {
        $sql = "SELECT $this->table.*
                    FROM $this->table";

        $requete = $this->pdo()->prepare($sql);

        $requete->execute();

        return $requete->fetchAll();
    }

    /**
     * Returns every section
     *
     * @return object
     */
    public function getSections()
    {
        $sql = "SELECT sections.*
        FROM sections";

        $requete = $this->pdo()->prepare($sql);

        $requete->execute();

        return $requete->fetchAll();
    }

    /**
     * Stores a new section in the database
     *
     * @param string $title
     * @return bool
     */
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

    /**
     * Deletes a section from the database using a given id
     *
     * @param int $id
     * @return bool
     */
    public function deleteSection($id)
    {
        $sql = "DELETE FROM sections
                WHERE id = :id";

        $requete = $this->pdo()->prepare($sql);

        return $requete->execute([
            ":id" => $id,
        ]);
    }

    /**
     * modifies a section from the database
     *
     * @param int $id
     * @param string $title
     * @return bool
     */
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