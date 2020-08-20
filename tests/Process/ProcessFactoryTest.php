<?php

declare(strict_types=1);

namespace Ramsey\Test\Dev\Tools\Process;

use Ramsey\Dev\Tools\Process\Process;
use Ramsey\Dev\Tools\Process\ProcessFactory;
use Ramsey\Test\Dev\Tools\RamseyTestCase;

class ProcessFactoryTest extends RamseyTestCase
{
    public function testFactory(): void
    {
        $factory = new ProcessFactory();

        $this->assertInstanceOf(Process::class, $factory->factory(['ls']));
    }
}
