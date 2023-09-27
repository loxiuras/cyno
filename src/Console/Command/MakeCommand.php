<?php

declare(strict_types=1);

namespace Cyno\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;

class MakeCommand extends Command
{
    private const FILE_EXTENSION = '.php';

    private InputInterface $input;
    protected string $attribute;
    protected string $filename;
    protected array $fileDirectories = [];

    public function configure(): void
    {
        $this->setDefinition([
            new InputArgument('name', InputArgument::REQUIRED, 'Name of file.'),
        ]);
    }

    public function setup(InputInterface $input): void
    {
        $this->input = $input;

        $this->getFileStructure();

        $this->validateFileLocation();

        $this->saveFile();

        fwrite(STDERR, '[SUCCESS] ' . ucfirst($this->attribute) . ' [' . $this->getFileLocation(true) . '] created successfully.');
    }

    private function getFileLocation(bool $includeComposeLocation = false): string
    {
        $location = $includeComposeLocation ? getcwd() . DIRECTORY_SEPARATOR : '';

        if (count($this->fileDirectories) > 0) {
            $location .= implode(DIRECTORY_SEPARATOR, $this->fileDirectories) . DIRECTORY_SEPARATOR;
        }

        return $location . $this->filename . self::FILE_EXTENSION;
    }

    /**
     * Setting the file and file structure based on the given input.
     */
    private function getFileStructure(): void
    {
        $filename = $this->input->getArgument('name');

        if (str_contains($filename, DIRECTORY_SEPARATOR)) {
            $fileStructure = explode(DIRECTORY_SEPARATOR, $filename);

            $fileIndex = count($fileStructure) - 1;
            $filename  = $fileStructure[$fileIndex];

            unset($fileStructure[$fileIndex]);

            $this->fileDirectories = array_filter($fileStructure);
        }

        $this->filename = $filename;
    }

    /**
     * Validate if the provided file is available in the repository.
     */
    private function validateFileLocation(): void
    {
        if (file_exists($this->getFileLocation(true))) {
            fwrite(STDERR, '[ERROR] ' . ucfirst($this->attribute) . ' already exists.');
            exit(Command::FAILURE);
        }
    }

    private function saveFile(): void
    {
        $path = __DIR__ . '/../../../stubs/' . $this->attribute . '.stub';

        if (!file_exists($path)) {
            fwrite(STDERR, '[ERROR] ' . ucfirst($this->attribute) . ' isn\'t available.');
            exit(Command::FAILURE);
        }

        $stub = file_get_contents($path);
        $stub = str_replace('%namespace%', 'Cyno/BusinessLogic/Schade', $stub);

        file_put_contents($this->getFileLocation(true), $stub);
    }
}