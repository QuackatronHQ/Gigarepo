<?php

declare(strict_types=1);

namespace App;

use App\Controller\PREFERENCEController;
use function bar as functionBar;
use function afunc;

class Foo
{
    public function run()
    {
        $preference = new PreferenceController();
        var_dump($preference->type);
        exit;

        $lower = make_string_lowercase('TEST');

        return $lower;
    }

    public function shouldReturnInt(): int
    {
    }
}
