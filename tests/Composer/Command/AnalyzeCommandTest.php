<?php

declare(strict_types=1);

namespace Ramsey\Test\Dev\Tools\Composer\Command;

use Composer\Console\Application;
use Mockery\MockInterface;
use Ramsey\Dev\Tools\Composer\Command\AnalyzeCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\HelperSet;
use Symfony\Component\Console\Input\StringInput;
use Symfony\Component\Console\Output\NullOutput;

class AnalyzeCommandTest extends CommandTestCase
{
    protected function setUp(): void
    {
        $this->commandClass = AnalyzeCommand::class;
        $this->baseName = 'analyze';

        parent::setUp();
    }

    public function testRun(): void
    {
        /** @var Command & MockInterface $commandPhpStan */
        $commandPhpStan = $this->mockery(Command::class, [
            'run' => 0,
        ]);

        /** @var Command & MockInterface $commandPsalm */
        $commandPsalm = $this->mockery(Command::class, [
            'run' => 0,
        ]);

        $input = new StringInput('');
        $output = new NullOutput();

        /** @var Application & MockInterface $application */
        $application = $this->mockery(Application::class, [
            'getHelperSet' => $this->mockery(HelperSet::class),
        ]);
        $application->shouldReceive('getDefinition')->passthru();
        $application
            ->expects()
            ->find($this->command->withPrefix('analyze:phpstan'))
            ->andReturn($commandPhpStan);
        $application
            ->expects()
            ->find($this->command->withPrefix('analyze:psalm'))
            ->andReturn($commandPsalm);

        $this->command->setApplication($application);

        $this->assertSame(0, $this->command->run($input, $output));
    }
}
