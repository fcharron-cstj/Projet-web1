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
    public function getEveryDish()
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
    public function storeMenuItem($title, $description, $image, $price, $section)
    {
        $sql = "INSERT INTO $this->table
        (title, description, image, price, section_id)
        VALUES (:title, :description, :image, :price, :section_id)
        ";

        $requete = $this->pdo()->prepare($sql);

        return $requete->execute([
            ":title" => $title,
            ":description" => $description,
            ":image" => $image,
            ":price" => $price,
            ":section_id" => $section,
        ]);
    }

    public function addMenuCategories($category_id, $dish_id = null)
    {
        if ($dish_id == null) {
            $dish_id = $this->pdo()->lastInsertId();
        }

        $sql = "INSERT INTO dish_category
        (category_id, dish_id)
        VALUES (:category_id, :dish_id)";

        $requete = $this->pdo()->prepare($sql);

        return $requete->execute([
            ":category_id" => $category_id,
            ":dish_id" => $dish_id,

        ]);
    }
    public function getDishFromId($id)
    {
        $sql = "SELECT DISTINCT $this->table.id, $this->table.title, $this->table.description, $this->table.price, $this->table.section_id, GROUP_CONCAT(dish_category.category_id) as categories 
                FROM $this->table
                JOIN dish_category
                    ON $this->table.id = dish_category.dish_id
                JOIN categories
                    ON dish_category.category_id = categories.id
                WHERE $this->table.id=:id";


        $requete = $this->pdo()->prepare($sql);

        $requete->execute([
            ":id" => $id,
        ]);

        return $requete->fetch();
    }

    public function modifyMenuItem($id, $title, $description, $image, $price, $section)
    {
        $sql = "UPDATE $this->table
                SET title = :title, description = :description, image = :image, price = :price, section_id = :section_id
                WHERE id=:id";

        $requete = $this->pdo()->prepare($sql);

        return $requete->execute([
            ":id" => $id,
            ":title" => $title,
            ":description" => $description,
            ":image" => $image,
            ":price" => $price,
            ":section_id" => $section,
        ]);
    }

    public function deleteMenuItemCategories($id)
    {
        $sql = "DELETE FROM dish_category
                WHERE dish_id = :id";


        $requete = $this->pdo()->prepare($sql);

        return $requete->execute([
            ":id" => $id,
        ]);
    }

    public function deleteDish($id)
    {
        $sql = "DELETE FROM $this->table
                WHERE id = :id";


        $requete = $this->pdo()->prepare($sql);

        return $requete->execute([
            ":id" => $id,
        ]);
    }
}