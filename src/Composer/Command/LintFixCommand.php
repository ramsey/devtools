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

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use function array_merge;

class LintFixCommand extends ProcessCommand
{
    public function getBaseName(): string
    {
        return 'lint:fix';
    }

    /**
     * @inheritDoc
     */
    public function getProcessCommand(InputInterface $input, OutputInterface $output): array
    {
        /** @var string[] $args */
        $args = $input->getArguments()['args'] ?? [];

        return array_merge(
            [
                $this->withBinPath('phpcbf'),
                '--cache=build/cache/phpcs.cache',
            ],
            $args,
        );
    }

    protected function configure(): void
    {
        $this
            ->setDescription('Checks source code for coding standards issues and fixes them, if possible.')
            ->setDefinition([
                new InputArgument('args', InputArgument::IS_ARRAY | InputArgument::OPTIONAL, ''),
            ]);
    }

    /**
     * This returns a 0 if phpcbf returns either a 0 or a 1. phpcbf returns the
     * following exit codes:
     *
     * * Exit code 0 is used to indicate that no fixable errors were found, so
     *   nothing was fixed
     * * Exit code 1 is used to indicate that all fixable errors were fixed correctly
     * * Exit code 2 is used to indicate that phpcbf failed to fix some of the
     *   fixable errors it found
     * * Exit code 3 is used for general script execution errors
     *
     * @link https://github.com/squizlabs/PHP_CodeSniffer/issues/1818#issuecomment-354420927
     */
    protected function doExecute(InputInterface $input, OutputInterface $output): int
    {
        $exitCode = parent::doExecute($input, $output);

        if ($exitCode > 1) {
            return $exitCode;
        }

        return 0;
    }
}
