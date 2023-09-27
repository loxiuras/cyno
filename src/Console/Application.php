<?php

declare(strict_types=1);

namespace Cyno\Console;

use Cyno\Console\Command\MakeServiceCommand;
use Symfony\Component\Console\Application as BaseApplication;


class Application extends BaseApplication
{
    public const VERSION = '1.0.0-DEV';

    public function __construct()
    {
        parent::__construct('cyno', self::VERSION);

        $this->add(new MakeServiceCommand());
    }
}