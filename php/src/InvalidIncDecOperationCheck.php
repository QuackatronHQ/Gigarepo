<?php

declare(strict_types=1);

namespace App;

use App\Foo;

class InvalidIncDecOperationCheck
{
    public function run(): void
    {
        /**
         * Incrementing objects
         */
        $fooObject = new \stdClass();
        $fooObject++;
        var_dump($fooObject);

        $date = date('j. n. Y')++;

        /**
         * Incrementing array
         */
        $array = [1, 2, 3];
        $array++;
        var_dump($array);

        /**
         * Incrementing booleans
         */
        $bool = false;
        $bool++;
        var_dump($bool);
    }
}
