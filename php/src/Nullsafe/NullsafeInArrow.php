<?php

declare(strict_types=1);

namespace App\Nullsafe;

class NullsafeInArrow
{
    public function run(): void
    {
        $func = function (\stdClass $foo): void {
            fn &() => $foo?->bar;
        };
        var_dump($func(new \stdClass()));
    }
}
