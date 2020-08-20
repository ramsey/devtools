<?php

declare(strict_types=1);

namespace Ramsey\Test\Dev\Tools\Composer\Command;

use Ramsey\Dev\Tools\Composer\Command\LintFixCommand;

class LintFixCommandTest extends ProcessCommandTestCase
{
    protected function setUp(): void
    {
        $this->commandClass = LintFixCommand::class;
        $this->baseName = 'lint:fix';
        $this->processCommand = ['/path/to/bin-dir/phpcbf', '--cache=build/cache/phpcs.cache', '--qux'];

        parent::setUp();

        $this->input->allows()->getArguments()->andReturn([
            'args' => ['--qux'],
        ]);
    }

    public function testRunSucceedsWithExitCode1(): void
    {
        $this->doTestRun(
            function (callable $callback): int {
                $callback('', 'test buffer string');

                return 1;
            },
            0,
        );
    }

    public function testRunFailsOver1(): void
    {
        $this->doTestRun(
            function (callable $callback): int {
                $callback('', 'test buffer string');

                return 2;
            },
            2,
        );
    }
}
