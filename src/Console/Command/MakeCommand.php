<?php

declare(strict_types=1);

namespace Cyno\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;

class MakeCommand extends Command
{
    public const NAMESPACE = '%namespace%';

    private InputInterface $input;

    public function setInput(InputInterface $input): void
    {
        $this->input = $input;
    }

    public function configure(): void
    {
        $this->setDefinition([
            new InputArgument('filename', InputArgument::REQUIRED, 'Name of file.'),
        ]);
    }

    public function getFilename(): string
    {
        $filename = $this->input->getArgument('filename');

        if (str_ends_with($filename, '.php')) {
            return substr($filename, 0, -4);
        }

        return $filename;
    }

    public function getStub(string $name, bool $replaceNamespace = true)
    {
        $path = __DIR__ . '/../../../stubs/' . $name . '.stub';

        if (!file_exists($path)) {
            fwrite(STDERR, "Stub of $name isn't found... try again later. Search path: $path");
            exit(Command::FAILURE);
        }

        $stub = file_get_contents($path);

        if ($replaceNamespace) {
            $stub = str_replace(self::NAMESPACE, 'Cyno/BusinessLogic/Schade', $stub);
        }

        return $stub;
    }
}