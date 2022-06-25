<?php

namespace App\NewStatic;

class Controller
{
    public function __construct(string $name)
    {
        //
    }

    public function getController(): self
    {
        return new static('Base'); //
    }
}
