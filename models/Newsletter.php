<?php

namespace Models;

use Bases\Model;

class Newsletter extends Model{
    protected $table = "newsletter";

    /**
     * Stores first name, last name and email in the database
     *
     * @return bool
     */
    public function store($first_name, $last_name, $email)
    {
        $sql = "INSERT INTO $this->table
                (first_name, last_name, email)
                VALUES (:first_name, :last_name, :email)";

        $requete = $this->pdo()->prepare($sql);

        return $requete->execute([
            ":first_name" => $first_name,
            ":last_name" => $last_name,
            ":email" => $email,

        ]);
    }


}
