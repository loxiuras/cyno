<?php

declare(strict_types=1);

namespace Cyno\Console\Command;

use JetBrains\PhpStorm\NoReturn;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'make:service')]
class MakeServiceCommand extends Command
{
    protected function configure(): void
    {
//        $this
//            ->setDefinition(
//                [
//                    new InputArgument('make', InputArgument::OPTIONAL, ''),
//                ]
//            )
//            ->setDescription('Make rule')
//        ;
    }

    #[NoReturn]
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        die('End...');

        return 0;
    }
}