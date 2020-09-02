<?php

declare(strict_types=1);

namespace Ramsey\Test\Dev\Tools\Composer\Command;

use Ramsey\Dev\Tools\Composer\Command\TestCoverageCiCommand;

class TestCoverageCiCommandTest extends ProcessCommandTestCase
{
    protected function setUp(): void
    {
        $this->commandClass = TestCoverageCiCommand::class;
        $this->baseName = 'test:coverage:ci';
        $this->processCommand = [
            '/path/to/bin-dir/phpunit',
            '--colors=always',
            '--coverage-clover',
            'build/coverage/clover.xml',
            '--coverage-xml',
            'build/coverage/coverage-xml',
            '--log-junit',
            'build/coverage/junit.xml',
            '--group',
            'foo',
        ];

        parent::setUp();

        $this->input->allows()->getArguments()->andReturn([
            'args' => ['--group', 'foo'],
        ]);
    }
}
