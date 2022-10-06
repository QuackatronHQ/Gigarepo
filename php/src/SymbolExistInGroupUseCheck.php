<?php

declare(strict_types=1);

namespace App;

use Utils\GroupUse\Version;
use function Utils\GroupUse\php_80;
use function Utils\GroupUse\php_81;
use const Utils\GroupUse\PHP_74;
use const Utils\GroupUse\PHP_73;

class SymbolExistInGroupUseCheck
{
    public function run(): void
    {
        /**
         * skipcq:  PHP-W1012
         *
         * Some comments
         *
         */
        var_dump(php_80());
        var_dump(php_81()); // invalid: function doesn't exist

        var_dump(PHP_74);
        var_dump(PHP_73); // invalid: constant doesn't exist

        var_dump(Version::php72());
        var_dump(Version::PHP73());

        var_dump(htmlSpecialChars('<strong>Foo</strong>'));
    }
}
