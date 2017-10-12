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

namespace JuliusHaertl\PHPDocToRst\Builder;

use phpDocumentor\Reflection\DocBlock\Tags\Param;
use phpDocumentor\Reflection\Php\Argument;
use phpDocumentor\Reflection\Php\Class_;

class ClassFileBuilder extends FileBuilder {

    protected function render() {

        /** @var Class_ $class */
        $class = $this->element;

        if (!$this->shouldRenderElement($class)) {
            return;
        }
        $this->addPageHeader($class);

        $this->indent();
        $this->addDocBlockDescription($class);
        $this->addParent($class);
        $this->addImplementedInterfaces($class);
        $this->addUsedTraits($class);
        $this->unindent();

        $this->addAfterIntroduction($class);

        $this->addConstants($class->getConstants());
        $this->addProperties($class->getProperties());

        $this->addMethods($class->getMethods());
    }

    /**
     * @param Class_ $element
     */
    protected function addImplementedInterfaces($element) {
        $implementedInterfaces = '';
        foreach ($element->getInterfaces() as $int) {
            $implementedInterfaces .= $this->getLink('interface', $int) . ' ';
        }
        if ($implementedInterfaces !== '') {
            $this->addFieldList('Implements', $implementedInterfaces);
        }
    }

}