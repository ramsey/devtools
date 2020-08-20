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

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CaptainHookInstallCommand extends ProcessCommand
{
    public function getBaseName(): string
    {
        return 'captainhook:install';
    }

    /**
     * @inheritDoc
     */
    public function getProcessCommand(InputInterface $input, OutputInterface $output): array
    {
        return [
            $this->withBinPath('captainhook'),
            'install',
            '--ansi',
            '-f',
            '-s',
        ];
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('<info>captainhook/captainhook:</info> Installing hooks...');

        $exitCode = parent::execute($input, $output);

        if ($exitCode !== 0) {
            $output->writeln('<error>captainhook/captainhook: Unable to install hooks</error>');
        } else {
            $output->writeln('<info>captainhook/captainhook:</info> ...done installing hooks');
        }

        return $exitCode;
    }
}
