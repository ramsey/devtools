<?php

declare(strict_types=1);

namespace Ramsey\Test\Dev\Tools\Composer\Command;

use Ramsey\Dev\Tools\Composer\Command\AnalyzePsalmCommand;

class AnalyzePsalmCommandTest extends ProcessCommandTestCase
{
    protected function setUp(): void
    {
        $this->commandClass = AnalyzePsalmCommand::class;
        $this->baseName = 'analyze:psalm';
        $this->processCommand = [
            '/path/to/bin-dir/psalm',
            '--diff',
            '--diff-methods',
            '--show-info=true',
            '--long-progress',
            '--stats',
            '--bar',
            '--baz',
        ];

        parent::setUp();

        $this->input->allows()->getArguments()->andReturn([
            'args' => ['--bar', '--baz'],
        ]);
    }
}
