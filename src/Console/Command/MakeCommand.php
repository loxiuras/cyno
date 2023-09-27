<?php

declare(strict_types=1);

namespace Cyno\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;

class MakeCommand extends Command
{
    protected function configure(): void
    {
        $this
            ->setDefinition(
                [
                    new InputArgument('make', InputArgument::REQUIRED, 'Make attribute'),
                ]
            )
            ->setDescription('Make rule')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        return 0;
    }
}