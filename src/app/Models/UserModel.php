<?php

namespace App\Models;

use App\BaseModel;

class UserModel extends BaseModel
{


    public function create(string $name, string $email, string $password): int
    {
        $userQuery = 'INSERT INTO users (name, email, password) VALUES(:name, :email, :password)';
        $userStmt = $this->db->prepare($userQuery);
        $userStmt->bindValue(':name', $name);
        $userStmt->bindValue(':email', $email);
        $userStmt->bindValue(':password', $password);

        $userStmt->execute();

        return (int) $this->db->lastInsertId();
    }
}