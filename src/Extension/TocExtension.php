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

namespace JuliusHaertl\PHPDocToRst\Extension;

use JuliusHaertl\PHPDocToRst\Builder\FileBuilder;
use JuliusHaertl\PHPDocToRst\Builder\InterfaceFileBuilder;
use JuliusHaertl\PHPDocToRst\Builder\RstBuilder;
use phpDocumentor\Reflection\Php\Interface_;

/**
 * This extension will render a list of methods  for easy access
 * at the beginning of classes, interfaces and traits
 */

class TocExtension extends Extension {

    /**
     * @param string $type
     * @param FileBuilder $builder
     */
    public function render($type, &$builder) {
        if ($type === InterfaceFileBuilder::SECTION_AFTER_DESCRIPTION) {
            $builder->addLine();
            /** @var Interface_ $interface */
            $interface = $builder->getElement();
            $builder->addH2('Methods');
            foreach ($interface->getMethods() as $method) {
                $builder->addLine('* :php:meth:`' . $method->getName() . '`');
            }
            $builder->addLine();
        }
    }

}