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
use phpDocumentor\Reflection\Element;
use phpDocumentor\Reflection\Php\Class_;
use phpDocumentor\Reflection\Php\Constant;
use phpDocumentor\Reflection\Php\Method;
use phpDocumentor\Reflection\Php\Property;

/**
 * Do not render classes marked with phpDoc internal tag
 * Do only render public methods/properties
 */

class PublicOnlyExtension extends Extension {

    public function shouldRenderElement(Element $element) {
        if ($element instanceof Class_) {
            /** @var Class_ $class */
            $class = $element;
            if ($class->getDocBlock() !== null && $class->getDocBlock()->hasTag('internal')) {
                return false;
            }
        }
        if ($element instanceof Method || $element instanceof Property) {
            /** @var Method|Property $class */
            $class = $element;
            if ((string)$class->getVisibility() !== 'public') {
                return false;
            }
        }
        return true;
    }

}