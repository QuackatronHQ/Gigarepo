<?php

namespace App\ImplementsKeyword;

class Mailchimp implements Email
{
    public function run(): void
    {
        var_dump('Sending email...');
    }
}
