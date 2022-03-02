<?php

namespace App\Model\Manager;


use App\Model\Entity\User;
use Connect;

class UserManager
{
    public function getUserById (int $id) : User {
        $user = new User();
        $query = Connect::dbConnect()->query("SELECT * FROM user WHERE id = $id");

        if ($query) {
          $userData = $query->fetchAll();
          $user
            ->setId($userData ['id'])
            ->setFirstName($userData['name'])
            ->setLastname($userData ['surname'])
            ->setPassword($userData ['password'])
            ->setAge($userData ['age'])
            ->setEmail($userData ['email'])
          ;
        }
        return $user;
    }
}