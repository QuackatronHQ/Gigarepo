<?php

declare(strict_types=1);

namespace App\AbstractUndefinedMethod;

use App\AbstractUndefinedMethod\BaseDatabase;

class Database extends BaseDatabase
{
    public function _backup(): void
    {
        var_dump('in _backup()');
    }
}
