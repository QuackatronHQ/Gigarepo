<?php

declare(strict_types=1);

namespace App;

class UnableToAccessPropertyCheck
{
    public ?User $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function run(): string
    {
        return $this->message;
    }

    public function getName(): string
    {
        return $this->user->name;
    }
}
