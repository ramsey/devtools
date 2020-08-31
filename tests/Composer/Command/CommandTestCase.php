<?php

declare(strict_types=1);

namespace Ramsey\Test\Dev\Tools\Composer\Command;

use Composer\Composer;
use Composer\Config;
use Composer\EventDispatcher\EventDispatcher;
use Mockery\MockInterface;
use Ramsey\Dev\Tools\Composer\Command\BaseCommand;
use Ramsey\Dev\Tools\Process\ProcessFactory;
use Ramsey\Dev\Tools\TestCase;
use Symfony\Component\Console\Input\StringInput;
use Symfony\Component\Console\Output\NullOutput;

use const DIRECTORY_SEPARATOR;

abstract class CommandTestCase extends TestCase
{
    /** @var class-string */
    protected string $commandClass;

    protected string $baseName;
    protected string $prefix = 'bar';
    protected string $binDir = '/path/to/bin-dir';
    protected string $repositoryRoot = '/path/to/repo';

    protected BaseCommand $command;

    /**
     * @var Composer & MockInterface
     */
    protected Composer $composer;

    /**
     * @var Config & MockInterface
     */
    protected Config $config;

    /**
     * @var ProcessFactory & MockInterface
     */
    protected ProcessFactory $processFactory;

    /**
     * @var EventDispatcher & MockInterface
     */
    protected EventDispatcher $eventDispatcher;

    abstract public function testRun(): void;

    protected function setUp(): void
    {
        $commandClass = $this->commandClass;

        $this->config = $this->mockery(Config::class);
        $this->config->allows()->get('bin-dir')->andReturn($this->binDir);

        $this->eventDispatcher = $this->mockery(EventDispatcher::class);
        $this->eventDispatcher->shouldReceive('dispatch');
        $this->eventDispatcher->shouldReceive('dispatchScript')->andReturn(0);

        $this->composer = $this->mockery(Composer::class, [
            'getPackage->getExtra' => [],
            'getConfig' => $this->config,
            'getEventDispatcher' => $this->eventDispatcher,
        ]);

        $this->processFactory = $this->mockery(ProcessFactory::class);

        $this->command = new $commandClass(
            $this->composer,
            $this->prefix,
            $this->repositoryRoot,
            $this->processFactory,
        );
    }

    public function testGetBaseName(): void
    {
        $this->assertSame($this->baseName, $this->command->getBaseName());
    }

    public function testGetBinDir(): void
    {
        $this->assertSame($this->binDir, $this->command->getBinDir());
    }

    public function testWithBinPath(): void
    {
        $binWithPath = $this->binDir . DIRECTORY_SEPARATOR . 'foo';

        $this->assertSame($binWithPath, $this->command->withBinPath('foo'));
    }

    public function testGetPrefix(): void
    {
        $prefixWithColon = $this->prefix . ':';

        $this->assertSame($prefixWithColon, $this->command->getPrefix());
    }

    public function testSetPrefixReturnsSelfAndSetsPrefix(): void
    {
        $this->assertSame($this->command, $this->command->setPrefix('baz'));
        $this->assertSame('baz:', $this->command->getPrefix());
    }

    public function testWithPrefix(): void
    {
        $prefixWithCommand = $this->prefix . ':cmd';

        $this->assertSame($prefixWithCommand, $this->command->withPrefix('cmd'));
    }

    public function testGetApplicationThrowsException(): void
    {
        $this->command->setApplication(null);

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Could not find an Application instance');

        $this->command->getApplication();
    }

    public function testRunWithOverride(): void
    {
        $this->composer->shouldReceive('getPackage->getExtra')->andReturn([
            'ramsey/devtools' => [
                'commands' => [
                    $this->command->getBaseName() => [
                        'override' => true,
                    ],
                ],
            ],
        ]);

        $input = new StringInput('');
        $output = new NullOutput();

        $commandClass = $this->commandClass;
        $command = new $commandClass(
            $this->composer,
            $this->prefix,
            $this->repositoryRoot,
            $this->processFactory,
        );

        $this->assertSame(0, $command->run($input, $output));
    }

    public function testRunWithAdditionalScripts(): void
    {
        $this->composer->shouldReceive('getPackage->getExtra')->andReturn([
            'ramsey/devtools' => [
                'commands' => [
                    $this->command->getBaseName() => [
                        'script' => [
                            'a script to run',
                            'another script to run',
                        ],
                    ],
                ],
            ],
        ]);

        $this->eventDispatcher->expects()->addListener(
            $this->command->getName(),
            'a script to run',
        );

        $this->eventDispatcher->expects()->addListener(
            $this->command->getName(),
            'another script to run',
        );

        $commandClass = $this->commandClass;

        // Replace the command with a new one, since the constructor is where
        // it figures out if there are additional scripts to add listeners for.
        $this->command = new $commandClass(
            $this->composer,
            $this->prefix,
            $this->repositoryRoot,
            $this->processFactory,
        );

        $this->testRun();
    }
}
