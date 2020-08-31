<?php

declare(strict_types=1);

namespace Ramsey\Test\Dev\Tools\Composer\Command;

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

    public function testGetProcessCommand(): void
    {
        /** @var ProcessCommand $command */
        $command = $this->command;

        $this->assertSame(
            $this->processCommand,
            $command->getProcessCommand($this->input, $this->output),
        );
    }

    public function testRun(): void
    {
        $this->doTestRun($this->getProcessCommandCallbackTest(), 0);
    }

    public function doTestRun(callable $processCommandCallbackTest, int $exitCode): void
    {
        /** @var Process & MockInterface $process */
        $process = $this->mockery(Process::class);
        $process->expects()->start();
        $process
            ->shouldReceive('wait')
            ->once()
            ->andReturnUsing($processCommandCallbackTest);

        $this->processFactory
            ->expects()
            ->factory($this->processCommand, $this->repositoryRoot)
            ->andReturn($process);

        $this->input->shouldIgnoreMissing();
        $this->output->expects()->write('test buffer string');

        $this->assertSame($exitCode, $this->command->run($this->input, $this->output));
    }

    private function getProcessCommandCallbackTest(): callable
    {
        return function (callable $callback): int {
            $callback('', 'test buffer string');

            return 0;
        };
    }
}
