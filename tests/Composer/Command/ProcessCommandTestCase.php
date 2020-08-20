<?php

declare(strict_types=1);

namespace Ramsey\Test\Dev\Tools\Composer\Command;

use Composer\EventDispatcher\EventDispatcher;
use Mockery\MockInterface;
use Ramsey\Dev\Tools\Composer\Command\ProcessCommand;
use Ramsey\Dev\Tools\Process\Process;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

abstract class ProcessCommandTestCase extends CommandTestCase
{
    /**
     * @var InputInterface & MockInterface
     */
    protected InputInterface $input;

    /**
     * @var OutputInterface & MockInterface
     */
    protected OutputInterface $output;

    /**
     * @var string[]
     */
    protected array $processCommand;

    protected function setUp(): void
    {
        parent::setUp();

        $this->input = $this->mockery(InputInterface::class);
        $this->output = $this->mockery(OutputInterface::class);
    }

    protected function getCommand(): ProcessCommand
    {
        /** @var ProcessCommand $command */
        $command = parent::getCommand();

        return $command;
    }

    public function testGetProcessCommand(): void
    {
        $this->assertSame(
            $this->processCommand,
            $this->getCommand()->getProcessCommand($this->input, $this->output),
        );
    }

    public function testRun(): void
    {
        $this->doTestRun($this->getProcessCommandCallbackTest(), 0);
    }

    public function doTestRun(callable $processCommandCallbackTest, int $exitCode): void
    {
        /** @var EventDispatcher & MockInterface $eventDispatcher */
        $eventDispatcher = $this->mockery(EventDispatcher::class, [
            'dispatch' => null,
        ]);
        $this->getComposer()->setEventDispatcher($eventDispatcher);

        /** @var Process & MockInterface $process */
        $process = $this->mockery(Process::class);
        $process->expects()->start();
        $process
            ->shouldReceive('wait')
            ->once()
            ->andReturnUsing($processCommandCallbackTest);

        $this
            ->getProcessFactory()
            ->expects()
            ->factory($this->processCommand, $this->repositoryRoot)
            ->andReturn($process);

        $this->input->shouldIgnoreMissing();
        $this->output->expects()->write('test buffer string');

        $this->assertSame($exitCode, $this->getCommand()->run($this->input, $this->output));
    }

    private function getProcessCommandCallbackTest(): callable
    {
        return function (callable $callback): int {
            $callback('', 'test buffer string');

            return 0;
        };
    }
}
