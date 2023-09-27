<?php

declare(strict_types=1);

namespace Cyno\Console\Command;

use JetBrains\PhpStorm\NoReturn;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'make:webservice',
    description: 'Creates a new webservice file.',
    hidden: false
)]
class MakeWebserviceCommand extends MakeCommand
{
    #[NoReturn]
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->setInput($input);

        $filename = $this->getFilename();
        $stub     = $this->getStub('webservice');

        fwrite(STDERR, "Webservice created successfully...");

        return Command::SUCCESS;
    }
}