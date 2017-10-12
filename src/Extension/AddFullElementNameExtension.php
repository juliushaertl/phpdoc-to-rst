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

use JuliusHaertl\PHPDocToRst\Builder\ExtensionBuilder;
use JuliusHaertl\PHPDocToRst\Builder\FileBuilder;
use JuliusHaertl\PHPDocToRst\Builder\InterfaceFileBuilder;
use JuliusHaertl\PHPDocToRst\Builder\PhpDomainBuilder;
use JuliusHaertl\PHPDocToRst\Builder\RstBuilder;
use phpDocumentor\Reflection\Php\Class_;
use phpDocumentor\Reflection\Php\Interface_;
use phpDocumentor\Reflection\Php\Trait_;

/**
 * Add the fully qualified element name including the namespace to each page
 */

class AddFullElementNameExtension extends Extension {

    /**
     * @param string $type
     * @param FileBuilder $builder
     */
    public function render($type, &$builder, $element) {
        if (!$builder instanceof FileBuilder) {
            return;
        }
        if ($type === PhpDomainBuilder::SECTION_BEFORE_DESCRIPTION) {
            if($element instanceof Class_) {
                $modifiers = $element->isAbstract() ? 'abstract' : '';
                $modifiers = $element->isFinal() ? ' final' : $modifiers;
                $builder->addLine(':php:`' . $modifiers . ' class ' . RstBuilder::escape($builder->getElement()->getName()) . ' {}`');
                $builder->addLine();
            }
        }
    }

}