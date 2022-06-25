<?php

namespace App\Attributes;

use App\Attributes\SetUp;
use App\Attributes\ActionHandler;

class CopyFile implements ActionHandler
{
    public string $fileName;
    public string $targetDirectory;

    #[\App\Attributes\SetUp]
    public function fileExists()
    {
        if (!file_exists($this->fileName)) {
            // throw new \RuntimeException("File does not exist");
        }
    }

    #[\App\Attributes\SetUp]
    public function targetDirectoryExists()
    {
        if (!file_exists($this->targetDirectory)) {
            mkdir($this->targetDirectory);
        } elseif (!is_dir($this->targetDirectory)) {
            // throw new \RuntimeException("Target directory $this->targetDirectory is not a directory");
        }
    }

    public function execute()
    {
        copy($this->fileName, $this->targetDirectory . '/' . basename($this->fileName));
    }
}

function executeAction(ActionHandler $actionHandler)
{
    $reflection = new \ReflectionObject($actionHandler);

    foreach ($reflection->getMethods() as $method) {
        $attributes = $method->getAttributes(SetUp::class);

        if (count($attributes) > 0) {
            $methodName = $method->getName();

            $actionHandler->$methodName();
        }
    }

    $actionHandler->execute();
}
