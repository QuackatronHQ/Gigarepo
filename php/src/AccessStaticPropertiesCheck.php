<?php

declare(strict_types=1);

namespace App;

class AccessStaticPropertiesCheck
{
    public static $message = 'Welcome';

    public $defaultMessage = 'Hello';

    public function run(): string
    {
        $greetings = sprintf('%s %s', self::$message, self::$name);

        return $greetings;
    }

    public function user(string $name): string
    {
        $greetings = sprintf('%s %s', self::$defaultMessage, $name); // $message is not static property

        return $greetings;
    }

    // public function parent(string $name): string
    // {
    //     $greetings = sprintf('%s %s', parent::$message, $name); // $message is not static property

    //     return $greetings;
    // }
}
