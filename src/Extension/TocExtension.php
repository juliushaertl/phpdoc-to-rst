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
use JuliusHaertl\PHPDocToRst\Builder\PhpDomainBuilder;
use JuliusHaertl\PHPDocToRst\Builder\RstBuilder;
use phpDocumentor\Reflection\Php\Argument;
use phpDocumentor\Reflection\Php\Class_;
use phpDocumentor\Reflection\Php\Interface_;
use PhpParser\Builder\Trait_;

/**
 * This extension will render a list of methods  for easy access
 * at the beginning of classes, interfaces and traits
 */

class TocExtension extends Extension {

    /**
     * @param string $type
     * @param FileBuilder $builder
     */
    public function render($type, &$builder, $element) {
        if ($type === PhpDomainBuilder::SECTION_AFTER_INTRODUCTION) {
            if ($element instanceof Class_ || $element instanceof Interface_ || $element instanceof Trait_) {
                $builder->addLine();
                $builder->addH2('Summary');

                /** @var Interface_ $interface */
                $interface = $builder->getElement();

                if(count($interface->getMethods()) > 0) {
                    $builder->addH3('Methods');
                    foreach ($interface->getMethods() as $method) {
                        $args = '';
                        /** @var Argument $argument */
                        foreach ($method->getArguments() as $argument) {
                            // TODO: defaults, types
                            $args .= '$' . $argument->getName() . ', ';
                        }
                        $args = substr($args, 0, -2);
                        $modifiers = $method->getVisibility();
                        $modifiers .= $method->isAbstract() ? ' abstract' : '';
                        $modifiers .= $method->isFinal() ? ' final' : '';
                        $modifiers .= $method->isStatic() ? ' static' : '';
                        $signature = $modifiers . ' ' . $method->getName() . '(' . $args . ')';

                        $builder->addLine('* ' . PhpDomainBuilder::getLink('meth', $method->getFqsen(), $signature));

                    }
                    $builder->addLine()->addLine();
                }
            }
        }

    }
}