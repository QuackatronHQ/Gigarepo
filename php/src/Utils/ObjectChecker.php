<?php

declare(strict_types=1);

namespace App\Utils;

class ObjectChecker
{
    /**
     * @var null|\App\Utils\Checker
     */
    protected $checker = null;

    public function isInstanceOfBaseGreet($object): bool
    {
        if ($object instanceof BaseGret) {
            return true;
        }

        return false;
    }
}
