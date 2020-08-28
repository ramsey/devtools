<?php

declare(strict_types=1);

namespace Ramsey\Test\Dev\Tools\Composer\Command;

use Ramsey\Dev\Tools\Composer\Command\TestUnitCommand;

class TestUnitCommandTest extends ProcessCommandTestCase
{
    protected function setUp(): void
    {
        $this->commandClass = TestUnitCommand::class;
        $this->baseName = 'test:unit';
        $this->processCommand = ['/path/to/bin-dir/phpunit', '--colors=always', '--group', 'foo'];

        parent::setUp();

        $this->input->allows()->getArguments()->andReturn([
            'args' => ['--group', 'foo'],
        ]);
    }
}
