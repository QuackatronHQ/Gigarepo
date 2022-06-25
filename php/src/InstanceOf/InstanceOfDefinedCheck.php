<?php

declare(strict_types=1);

namespace App\InstanceOf;

use App\InstanceOf\Factory;

class InstanceOfDefinedCheck
{
    public function run(): string
    {
        $factory = new Factory();

        if ($factory instanceof Factory) { // valid
            return '$factory var is instance of Factory';
        } elseif ($factory instanceof FACTORY) { // invalid class case
            return '$factory var is instance of FACTORY';
        }

        if ($factory instanceof Singletonsss) { // invalid: class doesn't exists
            return '$factory var is instance of Singleton';
        }

        return 'Not found';
    }
}

function definedCheck()
{
    $factory = new Factory();

    if ($factory instanceof self) { // invalid: Cannot use "self" when no class scope is active
        return sprintf('$factory var is instance of %s class', __CLASS__);
    } elseif ($factory instanceof parent) { // invalid: Cannot use "parent" when no class scope is active
        return sprintf('$factory var is instance of %s class', __CLASS__);
    }

    return 'Not found';
}
