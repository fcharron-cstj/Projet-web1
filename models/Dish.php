<?php

namespace Models;

use Bases\Model;

class Dish extends Model
{
    protected $table = "dishes";

    /**
     * Returns every dish
     *
     * @return object
     */
    public function everyDish()
    {
        $sql = "SELECT DISTINCT $this->table.id, $this->table.title, $this->table.description, $this->table.price, $this->table.section_id 
                FROM $this->table
                JOIN dish_category
                    ON $this->table.id = dish_category.dish_id
                JOIN categories
                    ON dish_category.category_id = categories.id
                ORDER BY categories.id";


        $requete = $this->pdo()->prepare($sql);

        $requete->execute();

        return $requete->fetchAll();
    }
    public function addMenuItem($title, $description, $image, $price, $section)
    {
        $sql = "INSERT INTO $this->table
        ($title, $description, $image, $price, $section)
        VALUES (:title, :description, :image, :price, :section_id)
        ";

        $requete = $this->pdo()->prepare($sql);

        return $requete->execute([
            ":title" => $title,
            ":description" => $description,
            ":price" => $price,
            ":image" => $image,
            ":section_id" => $section,
        ]);
    }

    public function addMenuCategories($category_id)
    {
        $id = $this->table->lastInsertId();

        $sql = "INSERT INTO dish_category
        ($category_id)
        VALUES (:category_id, :dish_id)";

        $requete = $this->pdo()->prepare($sql);

        return $requete->execute([
            ":category_id" => $category_id,
            ":dish_id" => $id,

        ]);
    }
}