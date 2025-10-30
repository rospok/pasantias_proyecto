<?php

namespace App\Interfaces;

interface IAuthUser
{
    public function login(array $credentials);

    public function logout();

    public function register(array $data);
}
