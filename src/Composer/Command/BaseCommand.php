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

use Composer\Command\BaseCommand as ComposerBaseCommand;
use Composer\Composer;
use RuntimeException;
use Symfony\Component\Console\Application;

use const DIRECTORY_SEPARATOR;

abstract class BaseCommand extends ComposerBaseCommand
{
    private string $prefix = '';
    private string $binDir;

    abstract public function getBaseName(): string;

    public function __construct(Composer $composer, string $prefix)
    {
        $this->setComposer($composer);
        $this->setPrefix($prefix);
        $this->binDir = (string) $composer->getConfig()->get('bin-dir');

        parent::__construct($this->withPrefix($this->getBaseName()));
    }

    public function getBinDir(): string
    {
        return $this->binDir;
    }

    public function withBinPath(string $bin): string
    {
        return $this->getBinDir() . DIRECTORY_SEPARATOR . $bin;
    }

    public function getPrefix(): string
    {
        return $this->prefix;
    }

    public function setPrefix(string $prefix): self
    {
        if ($prefix !== '' && substr($prefix, -1) !== ':') {
            $prefix .= ':';
        }

        $this->prefix = $prefix;

        return $this;
    }

    public function withPrefix(string $name): string
    {
        return $this->getPrefix() . $name;
    }

    public function getApplication(): Application
    {
        $application = parent::getApplication();

        if ($application === null) {
            throw new RuntimeException('Could not find an Application instance');
        }

        return $application;
    }
}
