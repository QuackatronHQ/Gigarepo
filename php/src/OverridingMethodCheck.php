<?php

declare(strict_types=1);

namespace App;

use App\Controller\PreferenceController;

class OverridingMethodCheck extends PreferenceController
{
    public function finalMethod(): string
    {
        return 'Override method.';
    }
}
