<?php

namespace App\Model\Manager;

use App\Model\Entity\User;
use Connect;

class UserRoleManager
{

    public function getUsersByRoleId(int $roleId) : array
    {
        $users = [];

        $usersQuery = Connect::dbConnect()->query(
            "SELECT * FROM user WHERE id IN = (SELECT user_fk FROM user_role WHERE role_fk = $roleId)")
        ;
        if ($usersQuery) {
            foreach ($usersQuery->fetchAll() as $userData) {
                $user = (new User())
                    ->setId($userData ['id'])
                    ->setEmail($userData ['email'])
                    ->setAge($userData ['age'])
                    ->setPassword($userData ['password'])
                    ->setLastname($userData ['name'])
                    ->setFirstName($userData ['surname'])
                    ;

                $users = $user;
            }
        }
        return $users;
    }
    
}