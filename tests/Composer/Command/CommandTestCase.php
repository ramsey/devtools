<?php

declare(strict_types=1);

namespace Ramsey\Test\Dev\Tools\Composer\Command;

use Composer\Composer;
use Composer\Config;
use Mockery\MockInterface;
use Ramsey\Dev\Tools\Composer\Command\BaseCommand;
use Ramsey\Dev\Tools\Process\ProcessFactory;
use Ramsey\Test\Dev\Tools\RamseyTestCase;

use const DIRECTORY_SEPARATOR;

abstract class CommandTestCase extends RamseyTestCase
{
    /** @var class-string */
    protected string $commandClass;

    protected string $baseName;
    protected string $prefix = 'bar';
    protected string $binDir = '/path/to/bin-dir';
    protected string $repositoryRoot = '/path/to/repo';

    private BaseCommand $command;
    private Composer $composer;

    /**
     * @var Config & MockInterface
     */
    private Config $config;

    /**
     * @var ProcessFactory & MockInterface
     */
    private ProcessFactory $processFactory;

    protected function setUp(): void
    {
        $commandClass = $this->commandClass;

        $this->config = $this->mockery(Config::class);
        $this->config->allows()->get('bin-dir')->andReturn($this->binDir);

        $this->composer = new Composer();
        $this->composer->setConfig($this->config);

        $this->processFactory = $this->mockery(ProcessFactory::class);

        $this->command = new $commandClass(
            $this->composer,
            $this->prefix,
            $this->repositoryRoot,
            $this->processFactory,
        );
    }

    protected function getCommand(): BaseCommand
    {
        return $this->command;
    }

    protected function getComposer(): Composer
    {
        return $this->composer;
    }

    /**
     * @return Config & MockInterface
     */
    protected function getConfig(): Config
    {
        return $this->config;
    }

    /**
     * @return ProcessFactory & MockInterface
     */
    protected function getProcessFactory(): ProcessFactory
    {
        return $this->processFactory;
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
}
