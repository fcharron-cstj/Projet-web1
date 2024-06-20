<?php

namespace Models;

use Bases\Model;

class Dish extends Model{
    protected $table = "dishes";

    /**
     * Returns every dish
     *
     * @return object
     */
    public function everyDish()
    {
        $sql = "SELECT $this->table.*
                FROM $this->table
                JOIN dish_category
                    ON $this->table.id = dish_category.dish_id
                JOIN categories
                    ON dish_category.category_id = categories.id";

        $requete = $this->pdo()->prepare($sql);

        $requete->execute();

        return $requete->fetchAll();
    }

}