<?php

declare(strict_types=1);

namespace Ramsey\Test\Dev\Tools\Composer\Command;

use Composer\Console\Application;
use Composer\EventDispatcher\EventDispatcher;
use Mockery\MockInterface;
use Ramsey\Dev\Tools\Composer\Command\TestAllCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\HelperSet;
use Symfony\Component\Console\Input\StringInput;
use Symfony\Component\Console\Output\NullOutput;

class TestAllCommandTest extends CommandTestCase
{
    protected function setUp(): void
    {
        $this->commandClass = TestAllCommand::class;
        $this->baseName = 'test:all';

        parent::setUp();
    }

    public function testGetAliases(): void
    {
        $this->assertSame(['test'], $this->getCommand()->getAliases());
    }

    public function testRun(): void
    {
        /** @var Command & MockInterface $commandLint */
        $commandLint = $this->mockery(Command::class, [
            'run' => 0,
        ]);

        /** @var Command & MockInterface $commandAnalyze */
        $commandAnalyze = $this->mockery(Command::class, [
            'run' => 0,
        ]);

        /** @var Command & MockInterface $commandTest */
        $commandTest = $this->mockery(Command::class, [
            'run' => 0,
        ]);

        $input = new StringInput('');
        $output = new NullOutput();

        /** @var EventDispatcher & MockInterface $eventDispatcher */
        $eventDispatcher = $this->mockery(EventDispatcher::class, [
            'dispatch' => null,
        ]);
        $this->getComposer()->setEventDispatcher($eventDispatcher);

        /** @var Application & MockInterface $application */
        $application = $this->mockery(Application::class, [
            'getHelperSet' => $this->mockery(HelperSet::class),
        ]);
        $application->shouldReceive('getDefinition')->passthru();
        $application
            ->expects()
            ->find($this->getCommand()->withPrefix('lint'))
            ->andReturn($commandLint);
        $application
            ->expects()
            ->find($this->getCommand()->withPrefix('analyze'))
            ->andReturn($commandAnalyze);
        $application
            ->expects()
            ->find($this->getCommand()->withPrefix('test:unit'))
            ->andReturn($commandTest);

        $this->getCommand()->setApplication($application);

        $this->assertSame(0, $this->getCommand()->run($input, $output));
    }
}
