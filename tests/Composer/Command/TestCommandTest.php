<?php

declare(strict_types=1);

namespace Ramsey\Test\Dev\Tools\Composer\Command;

use Ramsey\Dev\Tools\Composer\Command\TestCommand;

class TestCommandTest extends ProcessCommandTestCase
{
    protected function setUp(): void
    {
        $this->commandClass = TestCommand::class;
        $this->baseName = 'test';
        $this->processCommand = ['/path/to/bin-dir/phpunit', '--colors=always', '--group', 'foo'];

        parent::setUp();

        $this->input->allows()->getArguments()->andReturn([
            'args' => ['--group', 'foo'],
        ]);
    }
}
