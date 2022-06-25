<?php

namespace App;

class Bar
{
    public function run()
    {
        $hello = 'there!';
        // $hello = $hello;

        try {
            $this->functionFailsForSure();
        } catch (\Throwable $exception) {
            \Sentry\captureException($exception);
        }

        return 'hello';

        return 'again';
        $greet = 'Hello';
    }

    public function catch()
    {
        try {
        } catch (\FooCatchException $e) { // nonexistent exception class
        }
    }

    public function echo()
    {
        echo []; // invalid: will return warning - Array to string conversion

        echo new \stdClass(); // invalid: will return fatal error - Uncaught Error: Object of class stdClass could not be converted to string

        // invalid: will return fatal error - Object of class Closure could not be converted to string
        $getNameInUpperCase = function (string $name) {
            return strtoupper($name);
        };
        echo $getNameInUpperCase;
    }

    public function invalidTypeCast()
    {
        /**
         * Converting to boolean
         */
        var_dump((bool) 11); // valid
        var_dump((bool) 11.06629); // valid
        var_dump((bool) 'hello world'); // valid
        var_dump((bool) []); // valid
        var_dump((bool) new \stdClass()); // valid
        var_dump((bool) null); // valid

        /**
         * Converting to integer
         */
        var_dump((int) false); // valid
        (int) 1.0448; // valid
        var_dump((int) 'hello world'); // valid
        (int) []; // valid
        (int) new \stdClass(); // invalid: Warning:  Object of class stdClass could not be converted to int
        var_dump((int) null); // valid

        /**
         * Converting to float
         */
        var_dump((float) false); // valid
        var_dump((float) 11); // valid
        var_dump((float) 'hello world'); // valid
        var_dump((float) ['1']); // valid
        var_dump((float) new \stdClass()); // invalid: Warning:  Object of class stdClass could not be converted to float
        var_dump((float) null); // valid

        /**
         * Converting to string
         */
        var_dump((string) false); // valid
        var_dump((string) 11); // valid
        var_dump((string) 11.9202); // valid
        var_dump((string) ['1']); // invalid: Warning:  Array to string conversion
        var_dump((string) new \stdClass()); // invalid: Fatal Error: Object of class stdClass could not be converted to string
        var_dump((string) null); // valid

        /**
         * Converting to array
         */
        var_dump((array) false); // valid
        var_dump((array) 11); // valid
        var_dump((array) 11.9202); // valid
        var_dump((array) 'abcd'); // valid
        var_dump((array) new \stdClass()); // valid
        var_dump((array) null); // valid

        /**
         * Converting to object
         */
        var_dump((object) false); // valid
        var_dump((object) 11); // valid
        var_dump((object) 11.9202); // valid
        var_dump((object) 'abcd'); // valid
        var_dump((object) ['1' => 'Test']); // valid
        var_dump((object) null); // valid

        // invalid: Fatal error: The (unset) cast is no longer supported
        // (unset) [];

        // invalid: Fatal error:  Cannot use [] for reading
        // (null) [];
    }

    public function requireParamAfterOptional(): int
    {
        $sum = fn (int $x, int $y = 0, int $z): int => $x + $y + $z;

        return $sum(2, 4, 6);
    }

    public function literalArrayItem(): array
    {
        // $characters = ['Spock', 'Kirk', , 'McCoy'];

        return $characters;
    }

    public function arrayWithoutDimForReading(): void
    {
        $array = [];

        $array[] = 10;
        $array[][] = 10;
        $array[];
    }

    public function undefinedConstant()
    {
        var_dump(\NONEXISTENT_CONSTANT);
    }
}

function aFunc()
{
}
