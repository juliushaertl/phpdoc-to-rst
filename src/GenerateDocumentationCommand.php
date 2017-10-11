<?php
/**
 * @copyright Copyright (c) 2017 Julius Härtl <jus@bitgrid.net>
 *
 * @author Julius Härtl <jus@bitgrid.net>
 *
 * @license GNU AGPL version 3 or any later version
 *
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU Affero General Public License as
 *  published by the Free Software Foundation, either version 3 of the
 *  License, or (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU Affero General Public License for more details.
 *
 *  You should have received a copy of the GNU Affero General Public License
 *  along with this program. If not, see <http://www.gnu.org/licenses/>.
 *
 */

namespace JuliusHaertl\PHPDocToRst;

use JuliusHaertl\PHPDocToRst\Extension\PublicOnlyExtension;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

/**
 * Class GenerateDocumentationCommand
 * @package JuliusHaertl\PHPDocToRst
 * @internal Only for use of the phpdoc-to-rst cli tool
 */
class GenerateDocumentationCommand extends Command {

    protected function configure() {
        $this
            ->setName('generate')
            ->setDescription('Generate documentation')
            ->setHelp('This command allows you to generate sphinx/rst based documentation from PHPDoc annotations.')
            ->addArgument('target', InputArgument::REQUIRED, 'Destination for the generated rst files')
            ->addArgument(
                'src',
                InputArgument::IS_ARRAY,
                'Source directories to parse')
            ->addOption('public-only', 'p', InputOption::VALUE_NONE);
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $src = $input->getArgument('src');
        $dst = $input->getArgument('target');

        $apiDocBuilder = new ApiDocBuilder($src, $dst);
        if ($output->getVerbosity() >= OutputInterface::VERBOSITY_VERBOSE) {
            $apiDocBuilder->setVerboseOutput(true);
        }
        if ($output->getVerbosity() >= OutputInterface::VERBOSITY_VERY_VERBOSE) {
            $apiDocBuilder->setVerboseOutput(true);
            $apiDocBuilder->setDebugOutput(true);
        }
        if($input->getOption('public-only')) {
            $apiDocBuilder->addExtension(PublicOnlyExtension::class);
        }
        $apiDocBuilder->build();
    }
}