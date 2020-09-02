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

use ReflectionException;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

abstract class ProcessCommand extends BaseCommand
{
    /**
     * @return string[]
     */
    abstract public function getProcessCommand(InputInterface $input, OutputInterface $output): array;

    protected function getProcessCallback(OutputInterface $output): callable
    {
        return function (string $type, string $buffer) use ($output): void {
            $output->write($buffer);
        };
    }

    /**
     * @throws ReflectionException
     */
    protected function doExecute(InputInterface $input, OutputInterface $output): int
    {
        $process = $this->getConfiguration()->getProcessFactory()->factory(
            $this->getProcessCommand($input, $output),
            $this->getConfiguration()->getRepositoryRoot(),
        );

        $process->start();

        return (int) $process->wait($this->getProcessCallback($output));
    }
}
