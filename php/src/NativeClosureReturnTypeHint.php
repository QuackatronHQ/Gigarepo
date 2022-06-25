<?php

declare(strict_types=1);

namespace App;

use App\Controller\PreferenceController;

class NativeClosureReturnTypeHint
{
    public function run(): string
    {
        $closure = function () {
            return 'Hello, there!';
        };

        return $closure();
    }
}
