<?php

namespace App;

class InvalidCallMethodsCheck
{
    public function run()
    {
        $this->notExist();
    }

    public function returnsVoid(): void
    {
        //
    }

    public function usesVoid(): void
    {
        $result = $this->returnsVoid();
        var_dump($result === true);

        if ($result) {
            var_dump('expression');
        }
    }
}
