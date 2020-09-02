<?php

declare(strict_types=1);

namespace Ramsey\Test\Dev\Tools\Composer\Command;

use Composer\Composer;
use Mockery\MockInterface;
use Ramsey\Dev\Tools\Composer\Command\Configuration;
use Ramsey\Dev\Tools\Process\ProcessFactory;
use Ramsey\Dev\Tools\TestCase;

class ConfigurationTest extends TestCase
{
    public function testConfiguration(): void
    {
        /** @var Composer & MockInterface $composer */
        $composer = $this->mockery(Composer::class);
        $commandPrefix = 'foo';
        $repositoryRoot = '/path/to/repo';

        $config = new Configuration($composer, $commandPrefix, $repositoryRoot);

        $this->assertSame($composer, $config->getComposer());
        $this->assertSame($commandPrefix, $config->getCommandPrefix());
        $this->assertSame($repositoryRoot, $config->getRepositoryRoot());
        $this->assertInstanceOf(ProcessFactory::class, $config->getProcessFactory());
    }
}
