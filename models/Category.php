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

}