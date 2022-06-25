<?php

declare(strict_types=1);

namespace App\CallToFunctionParam;

class FunctionParamTest
{
    public function run()
    {
        // invalid
        var_dump(\App\CallToFunctionParam\sum('1', 2));

        // invalid: Too few arguments to function, 1 passed, 2 expected
        var_dump(\App\CallToFunctionParam\sum(a: 1));

        // invalid: argument #1 ($a) cannot be passed by reference
        var_dump(\App\CallToFunctionParam\incre(1));

        // valid
        $a = 1;
        var_dump(\App\CallToFunctionParam\incre($a));
    }
}

function sum(int $a, int $b)
{
    return $a + $b;
}

function incre(int &$a)
{
    $a++;

    return $a;
}
