<?php

namespace Models;

use Bases\Model;

class User extends Model
{
    protected $table = "users";

    /**
     * Stores log-in information from the user in the database  
     *
     * @param string $username
     * @param string $email
     * @param string $password
     * @return bool
     */
    public function registerAccount(string $username, string $email, string $password)
    {
        $sql = "INSERT INTO $this->table (username, email, password)
                VALUES (:username, :email, :password)";

        $request = $this->pdo()->prepare($sql);

        return $request->execute([
            ":username" => $username,
            ":email" => $email,
            ":password" => $password,
        ]);
    }
    /**
     * Returns the information of a user using a given email
     *
     * @param string $email
     * @return object|false
     */
    public function getUserEmail($email)
    {
        $sql = "SELECT * 
                FROM $this->table
                WHERE email = :email";

        $request = $this->pdo()->prepare($sql);

        $request->execute([
            ":email" => $email
        ]);

        return $request->fetch();
    }


}
