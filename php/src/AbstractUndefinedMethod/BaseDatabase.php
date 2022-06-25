<?php

declare(strict_types=1);

namespace App\AbstractUndefinedMethod;

abstract class BaseDatabase
{
    public function backup(): void
    {
        var_dump('in backup()');

        $this->_backup();
    }
}
