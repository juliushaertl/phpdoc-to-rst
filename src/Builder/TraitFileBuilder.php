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
use phpDocumentor\Reflection\Php\Trait_;

class TraitFileBuilder extends FileBuilder {

    protected function render() {
        /** @var Trait_ $trait */
        $trait = $this->element;

        if (!$this->shouldRenderElement($trait)) {
            return;
        }

        $this->addPageHeader($trait);

        $this->indent();
        $this->addDocBlockDescription($trait);
        $this->addUsedTraits($trait);
        $this->unindent();
        $this->addAfterIntroduction($trait);

        $this->addProperties($trait->getProperties());

        $this->addMethods($trait->getMethods());
    }

}