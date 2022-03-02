<?php

namespace App\Model\Manager;

use App\Model\Entity\Role;
use Connect;
use App\Model\Manager\UserRoleManager;

class RoleManager
{
    private UserRoleManager $userRoleManager;

    public function __construct()
    {
        $this->userRoleManager = new UserRoleManager();
    }

    public function findAll(): array {
        $roles = [];
        $query = $query = Connect::dbConnect()->query("SELECT * FROM role ");

        if ($query) {
           foreach ($query->fetchAll() as $role) {
               $roles = (new Role())
                   ->setId($role['id'])
                   ->setRoleName($role['role_name'])
                   ->setUsers($this->userRoleManager->getUsersByRoleId($role['id']))
               ;
                   $roles[] = $role;
           }

        }
        return $roles;
    }
}