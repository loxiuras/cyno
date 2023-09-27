<?php

declare(strict_types=1);

namespace Cyno\Console\Command;

use JetBrains\PhpStorm\NoReturn;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'make:service',
    description: 'Creates a new service file.',
    hidden: false
)]
class MakeServiceCommand extends MakeCommand
{
    #[NoReturn]
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->setInput($input);

        $filename = $this->getFilename();
        $stub     = $this->getStub('service');

        var_dump($filename);
        var_dump("\n");
        var_dump($stub);
        die;

        return Command::SUCCESS;
    }
}