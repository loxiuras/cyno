<?php

declare(strict_types=1);

namespace Cyno\Console\Command;

use Symfony\Component\Console\Command\Command;

class MakeCommand extends Command
{
    public function getFetchStub(string $name)
    {
        $path = __DIR__ . '/stubs/' . $name . '.stub';

        if (!file_exists($path)) {
            fwrite(STDERR, "Stub of $name isn't found... try again later. Search path: $path");
            exit(1);
        }

        return file_get_contents($path);
    }
}