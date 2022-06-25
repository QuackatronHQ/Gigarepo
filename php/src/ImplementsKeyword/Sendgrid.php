<?php

namespace App\ImplementsKeyword;

use App\ImplementsKeyword\MessageTrait;

class Sendgrid implements MessageTrait
{
    public function run(): void
    {
        var_dump('Sending email...');
    }
}
