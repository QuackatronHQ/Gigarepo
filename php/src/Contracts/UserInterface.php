<?php

namespace App\Contracts;

interface UserInterface
{
    public function setName(string $firstName, string $lastName): void;
}
