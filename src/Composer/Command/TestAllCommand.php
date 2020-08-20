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

use Exception;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestAllCommand extends BaseCommand
{
    public function getBaseName(): string
    {
        return 'test:all';
    }

    /**
     * Supports the use of `composer test`, without the command prefix/namespace
     *
     * @return string[]
     */
    public function getAliases(): array
    {
        return ['test'];
    }

    protected function configure(): void
    {
        $this->setDescription('Runs linting, static analysis, and unit tests.');
    }

    /**
     * @throws Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $lint = $this->getApplication()->find($this->withPrefix('lint'));
        $analyze = $this->getApplication()->find($this->withPrefix('analyze'));
        $test = $this->getApplication()->find($this->withPrefix('test'));

        $lintExit = $lint->run($input, $output);
        $analyzeExit = $analyze->run($input, $output);
        $testExit = $test->run($input, $output);

        return $lintExit + $analyzeExit + $testExit;
    }
}
