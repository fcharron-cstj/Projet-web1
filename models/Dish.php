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
        $sql = "SELECT DISTINCT $this->table.id, $this->table.title, $this->table.description, $this->table.price, $this->table.section_id, $this->table.image 
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

    /**
     * Stores a menu item in the database
     *
     * @param string $title
     * @param string $description
     * @param string $image
     * @param string $price
     * @param int $section
     * @return bool
     */
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

    /**
     * Stores a menu item category in the database
     * If no menu item is given, last id will be used instead
     *
     * @param int $category_id
     * @param int $dish_id
     * @return bool
     */
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

    /**
     * Returns a dish from a given id
     *
     * @param int $id
     * @return object
     */
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

    /**
     * Modifies an item in the database
     *
     * @param int $id
     * @param string $title
     * @param string $description
     * @param string $image
     * @param string $price
     * @param int $section
     * @return bool
     */
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

    /**
     * Deletes a menu item category using a given id
     *
     * @param int $id
     * @return bool
     */
    public function deleteMenuItemCategories($id)
    {
        $sql = "DELETE FROM dish_category
                WHERE dish_id = :id";


        $requete = $this->pdo()->prepare($sql);

        return $requete->execute([
            ":id" => $id,
        ]);
    }

    /**
     * Deletes a menu item using a given id
     *
     * @param int $id
     * @return bool
     */
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