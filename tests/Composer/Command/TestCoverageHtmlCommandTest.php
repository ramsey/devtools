<?php

declare(strict_types=1);

namespace Ramsey\Test\Dev\Tools\Composer\Command;

use Ramsey\Dev\Tools\Composer\Command\TestCoverageHtmlCommand;

class TestCoverageHtmlCommandTest extends ProcessCommandTestCase
{
    protected function setUp(): void
    {
        $this->commandClass = TestCoverageHtmlCommand::class;
        $this->baseName = 'test:coverage:html';
        $this->processCommand = [
            '/path/to/bin-dir/phpunit',
            '--colors=always',
            '--coverage-html',
            'build/coverage/coverage-html',
            '--group',
            'bip',
        ];

        parent::setUp();

        $this->input->allows()->getArguments()->andReturn([
            'args' => ['--group', 'bip'],
        ]);
    }
}
