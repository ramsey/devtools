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

namespace Ramsey\Dev\Tools\Composer\Command;

use Composer\Composer;
use Ramsey\Dev\Tools\Process\ProcessFactory;

/**
 * Configuration for commands
 */
class Configuration
{
    private Composer $composer;
    private string $commandPrefix;
    private string $repositoryRoot;
    private ProcessFactory $processFactory;

    public function __construct(
        Composer $composer,
        string $commandPrefix,
        string $repositoryRoot,
        ?ProcessFactory $processFactory = null
    ) {
        $this->composer = $composer;
        $this->commandPrefix = $commandPrefix;
        $this->repositoryRoot = $repositoryRoot;
        $this->processFactory = $processFactory ?? new ProcessFactory();
    }

    public function getComposer(): Composer
    {
        return $this->composer;
    }

    public function getCommandPrefix(): string
    {
        return $this->commandPrefix;
    }

    public function getRepositoryRoot(): string
    {
        return $this->repositoryRoot;
    }

    public function getProcessFactory(): ProcessFactory
    {
        return $this->processFactory;
    }
}
