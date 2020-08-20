<?php

declare(strict_types=1);

namespace Ramsey\Test\Dev\Tools\Process;

use Symfony\Component\Process\Process as SymfonyProcess;

/**
 * phpcs:disable
 */
class ProcessMock extends SymfonyProcess
{
    // @phpstan-ignore-next-line
    public function __construct($command, $cwd = null)
    {
        // Use a dummy command.
        parent::__construct(['ls']);
    }
}
