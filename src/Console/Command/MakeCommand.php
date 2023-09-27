<?php

declare(strict_types=1);

namespace Cyno\Console\Command;

use Symfony\Component\Console\Command\Command;

class MakeCommand extends Command
{
    public const NAMESPACE = '%namespace%';

    public function getFetchStub(string $name, bool $replaceNamespace = true)
    {
        $path = __DIR__ . '/../../../stubs/' . $name . '.stub';

        if (!file_exists($path)) {
            fwrite(STDERR, "Stub of $name isn't found... try again later. Search path: $path");
            exit(1);
        }

        $stub = file_get_contents($path);

        return str_replace(self::NAMESPACE, 'Cyno/BusinessLogic/Schade', $stub);
    }
}