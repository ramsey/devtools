<?php

/**
 * This file is part of ramsey/devtools
 *
 * ramsey/devtools is open source software: you can distribute
 * it and/or modify it under the terms of the MIT License
 * (the "License"). You may not use this file except in
 * compliance with the License.
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or
 * implied. See the License for the specific language governing
 * permissions and limitations under the License.
 *
 * @copyright Copyright (c) Ben Ramsey <ben@benramsey.com>
 * @license https://opensource.org/licenses/MIT MIT License
 */

declare(strict_types=1);

namespace Ramsey\Dev\Tools\Composer;

use Composer\Composer;
use Composer\EventDispatcher\EventSubscriberInterface;
use Composer\Factory;
use Composer\IO\IOInterface;
use Composer\Plugin\Capability\CommandProvider;
use Composer\Plugin\Capable;
use Composer\Plugin\PluginInterface;
use Exception;
use Ramsey\Dev\Tools\Composer\Command\AnalyzeCommand;
use Ramsey\Dev\Tools\Composer\Command\AnalyzePhpStanCommand;
use Ramsey\Dev\Tools\Composer\Command\AnalyzePsalmCommand;
use Ramsey\Dev\Tools\Composer\Command\BaseCommand;
use Ramsey\Dev\Tools\Composer\Command\BuildCleanCommand;
use Ramsey\Dev\Tools\Composer\Command\BuildClearCacheCommand;
use Ramsey\Dev\Tools\Composer\Command\CaptainHookInstallCommand;
use Ramsey\Dev\Tools\Composer\Command\LintCommand;
use Ramsey\Dev\Tools\Composer\Command\LintFixCommand;
use Ramsey\Dev\Tools\Composer\Command\PreCommitCommand;
use Ramsey\Dev\Tools\Composer\Command\TestAllCommand;
use Ramsey\Dev\Tools\Composer\Command\TestCoverageCiCommand;
use Ramsey\Dev\Tools\Composer\Command\TestCoverageHtmlCommand;
use Ramsey\Dev\Tools\Composer\Command\TestUnitCommand;
use Ramsey\Dev\Tools\Process\ProcessFactory;
use Symfony\Component\Console\Input\StringInput;
use Symfony\Component\Console\Output\ConsoleOutput;

use function realpath;

/**
 * Provides a variety of Composer commands and events useful for PHP
 * library and application development
 */
class DevToolsPlugin implements
    Capable,
    CommandProvider,
    EventSubscriberInterface,
    PluginInterface
{
    private static Composer $composer;

    private ProcessFactory $processFactory;
    private string $repoRoot;

    public function __construct()
    {
        $composerFile = (string) Factory::getComposerFile();

        $this->repoRoot = (string) realpath(dirname($composerFile));
        $this->processFactory = new ProcessFactory();
    }

    /**
     * @return array<string, mixed>
     */
    public static function getSubscribedEvents(): array
    {
        return [
            'post-autoload-dump' => 'onPostAutoloadDump',
        ];
    }

    /**
     * @throws Exception
     */
    public function onPostAutoloadDump(): void
    {
        $this->getCaptainHookInstallCommand()->run(
            new StringInput(''),
            new ConsoleOutput(),
        );
    }

    /**
     * @return array<string, string>
     */
    public function getCapabilities(): array
    {
        return [
            CommandProvider::class => self::class,
        ];
    }

    /**
     * @return BaseCommand[]
     */
    public function getCommands(): array
    {
        $prefix = $this->getCommandPrefix();

        return [
            new AnalyzeCommand(self::$composer, $prefix),
            new AnalyzePhpStanCommand(self::$composer, $prefix, $this->repoRoot, $this->processFactory),
            new AnalyzePsalmCommand(self::$composer, $prefix, $this->repoRoot, $this->processFactory),
            new BuildCleanCommand(self::$composer, $prefix, $this->repoRoot, $this->processFactory),
            new BuildClearCacheCommand(self::$composer, $prefix, $this->repoRoot, $this->processFactory),
            new LintCommand(self::$composer, $prefix, $this->repoRoot, $this->processFactory),
            new LintFixCommand(self::$composer, $prefix, $this->repoRoot, $this->processFactory),
            new PreCommitCommand(self::$composer, $prefix),
            new TestAllCommand(self::$composer, $prefix),
            new TestUnitCommand(self::$composer, $prefix, $this->repoRoot, $this->processFactory),
            new TestCoverageCiCommand(self::$composer, $prefix, $this->repoRoot, $this->processFactory),
            new TestCoverageHtmlCommand(self::$composer, $prefix, $this->repoRoot, $this->processFactory),
        ];
    }

    public function activate(Composer $composer, IOInterface $io): void
    {
        self::$composer = $composer;
    }

    public function deactivate(Composer $composer, IOInterface $io): void
    {
    }

    public function uninstall(Composer $composer, IOInterface $io): void
    {
    }

    public function getCaptainHookInstallCommand(): CaptainHookInstallCommand
    {
        return new CaptainHookInstallCommand(static::$composer, '', $this->repoRoot, $this->processFactory);
    }

    /**
     * Use extra.command-prefix, if available, but extra.ramsey/devtools.command-prefix
     * takes precedence over extra.command-prefix.
     */
    private function getCommandPrefix(): string
    {
        /** @psalm-var array{command-prefix?: string, ramsey/devtools?: array{command-prefix?: string}} $extra */
        $extra = self::$composer->getPackage()->getExtra();
        $prefix = (string) ($extra['command-prefix'] ?? '');

        return (string) ($extra['ramsey/devtools']['command-prefix'] ?? $prefix);
    }
}
