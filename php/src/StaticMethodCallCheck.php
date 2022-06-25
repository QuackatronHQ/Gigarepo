<?php

declare(strict_types=1);

namespace App;

class StaticMethodCallCheck
{
    public static function write(string $string): string
    {
        return $string;
    }

    public function run(): void
    {
        echo 'Hello, ' . (string) Logger::write('there');
    }
}
