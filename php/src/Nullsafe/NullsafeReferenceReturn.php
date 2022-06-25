<?php

declare(strict_types=1);

namespace App\Nullsafe;

class NullsafeReferenceReturn
{
    public function run(): void
    {
        $foo = new \stdClass();
        $func = function &() use ($foo) {
            if (rand(0, 1)) {
                return $foo;
            }

            return $foo?->bar->foo; // invalid: Cannot take reference of a nullsafe chain
        };
        var_dump($func());

        $func2 = function &() use ($foo) {
            if (rand(0, 1)) {
                return $foo;
            }

            if ($foo === null) {
                return null;
            }

            return $foo;
        };
        var_dump($func2());
    }
}
