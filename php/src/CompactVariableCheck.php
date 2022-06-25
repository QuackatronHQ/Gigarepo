<?php

declare(strict_types=1);

namespace App;

class CompactVariableCheck
{
    public function run(): void
    {
        $city  = 'San Francisco';
        $state = 'CA';
        $event = 'SIGGRAPH';

        $locationVars = array('city', 'state');

        $result = compact('event', $locationVars, 'undefined');

        var_dump($result);
    }

    public function display(): array
    {
        $title = 'About us';
        $slug = 'about-us';

        return compact('title', 'slug', 'description');
    }
}
