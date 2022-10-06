<?php

declare(strict_types=1);

namespace App;

class Greet
{
    private $defaultMessage;

    public function __contruct()
    {
        $this->defaultMessage = 'Hey %s,';
    }

    public function run(): void
    {
        echo $greetings;

        $greetings = 'Hello';
    }

    public function greet(): string
    {
        $message = static function () {
            return $this->getMessage();
        };

        return $message();
    }

    protected function getMessage(): string
    {
        return 'Hello there!';
    }

    public function setMessage(string $message): void
    {
        if (isset($defaultMessage)) {
            $message = $defaultMessage;
        }

        $greet = function ($name) use ($message) {
            return $name;
        };

        $greet('John');
    }

    public function methodWithInnerFunction(Fo $foo)
    {
        function getFromUserName()
        {
            return [];
        }
    }
}
