<?php

declare(strict_types=1);

namespace App;

class UninitializedPropertyCheck
{
    private int $errorsCount;
    private array $errors;

    public function __construct(int $errorsCount)
    {
        $this->errorsCount += 1;
    }

    public function run(): int
    {
        return $this->errorsCount;
    }
}
