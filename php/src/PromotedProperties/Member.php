<?php

namespace App\PromotedProperties;

class Member
{
    // invalid: Cannot declare variadic promoted property
    public function __construct(public ...$properties)
    {
    }
}
