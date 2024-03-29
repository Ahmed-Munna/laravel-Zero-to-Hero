<?php
namespace App\Services\Interfeces;

interface UsersInterfaces
{
    public function getAllUsers();
    public function getUserById($id);
    public function createOrUpdate($id = null, $collection = []);
    public function destroyUser($id);
}