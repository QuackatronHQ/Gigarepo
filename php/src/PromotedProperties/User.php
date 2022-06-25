<?php

namespace App\PromotedProperties;

class User extends AbstractUser
{
    // valid
    public function __construct(public string $firstName, public string $lastName)
    {
    }

    // invalid: cannot declare promoted property outside a constructor
    public function setName(public string $firstName, public string $lastName): void
    {
    }
}
