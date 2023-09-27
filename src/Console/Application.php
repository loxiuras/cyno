<?php

declare(strict_types=1);

namespace Cyno\Console;

use Cyno\Console\Command\MakeCommand;
use Symfony\Component\Console\Application as BaseApplication;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'make')]
class Application extends BaseApplication
{
    public const VERSION = '1.0.0-DEV';

    public function __construct()
    {
        parent::__construct('cyno', self::VERSION);

        $this->add(new MakeCommand());
    }
}