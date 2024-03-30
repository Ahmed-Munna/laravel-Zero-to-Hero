<?php
namespace App\Services\Interfeces;

interface CreateUserInterfece
{
    public function showUsers();
    public  function getUserById($id);
    public function createOrUpdate($id = null, $collection);
    public function destroyUser($id);
}