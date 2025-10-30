<?php

namespace App\Interfaces;

interface UserManagementInterface
{
    public function searchEmailAndRol(string $email, int $rol);

    public function createUser(array $data);

    public function updateUser(int $id, array $data);

    public function listUsers();

    public function getUserById(int $id);

    public function toggleUserStatus(int $id);

    // public function selectUser($statusDisabledId = null);
}
