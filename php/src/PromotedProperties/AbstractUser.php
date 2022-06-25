<?php

namespace App\PromotedProperties;

abstract class AbstractUser
{
    // invalid: Cannot declare promoted property in an abstract constructor
    abstract public function __construct(public string $firstName, public string $lastName);

    abstract public function getUser(): array
    {
    }
}
