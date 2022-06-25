<?php

declare(strict_types=1);

namespace App;

class RegexPatternCheck
{
    public function run(): void
    {
        var_dump(preg_match('joke', 'joke')); // invalid
        var_dump(preg_match('/(joke)/', 'joke')); // valid

        $textStartsWithRoundBrackets = '(text)';
        var_dump(preg_match('~(*~', $textStartsWithRoundBrackets)); // invalid
        var_dump(preg_match('~\(*~', $textStartsWithRoundBrackets)); // valid

        // var_dump(preg_match_all('nok', ''));
    }
}
