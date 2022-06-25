<?php

declare(strict_types=1);

namespace App;

class StaticPropertyCallCheck
{
    private static $path = null;

    public function run(): void
    {
        // invalid
        self::$name = 'test';

        // valid
        self::$path = '/home/user';
    }
}
