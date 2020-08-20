<?php

declare(strict_types=1);

namespace Ramsey\Test\Dev\Tools\Composer\Command;

use Ramsey\Dev\Tools\Composer\Command\AnalyzePhpStanCommand;

class AnalyzePhpStanCommandTest extends ProcessCommandTestCase
{
    protected function setUp(): void
    {
        $this->commandClass = AnalyzePhpStanCommand::class;
        $this->baseName = 'analyze:phpstan';
        $this->processCommand = ['/path/to/bin-dir/phpstan', 'analyse', '--ansi', '--memory-limit=1G', '--foo'];

        parent::setUp();

        $this->input->allows()->getArguments()->andReturn([
            'args' => ['--foo'],
        ]);
    }
}
