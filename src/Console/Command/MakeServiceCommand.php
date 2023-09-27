<?php

declare(strict_types=1);

namespace Cyno\Console\Command;

use JetBrains\PhpStorm\NoReturn;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'make:service',
    description: 'Creates a new service file.',
    hidden: false
)]
class MakeServiceCommand extends Command
{
    #[NoReturn]
    protected function execute(InputInterface $input, OutputInterface $output): int
    {

        return Command::SUCCESS;
    }
}