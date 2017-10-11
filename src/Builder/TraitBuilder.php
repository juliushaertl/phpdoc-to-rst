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

class TraitBuilder extends Builder {

    protected function render() {
        /** @var Trait_ $trait */
        $trait = $this->element;

        $docBlock = $trait->getDocBlock();

        $this->addH1(self::escape($trait->getFqsen()));

        $namespace = str_replace('\\' . $trait->getName(), '', $trait->getFqsen());
        if($namespace !== '') {
            $this->beginPhpDomain('namespace', substr($namespace, 1), false);
        }

        $this->beginPhpDomain('trait', $trait->getName(), false);

        $this->indent();
        if ($docBlock) {
            $this
                ->addLine($docBlock->getDescription())
                ->addLine();
        }

        $usedTraits = '';
        foreach ($trait->getUsedTraits() as $trait) {
            $usedTraits .= $this->getLink('trait', $trait) . ' ';
        }
        $this->addFieldList('Traits', $usedTraits);

        $this->unindent();
        $this->addLine();
        $this->addLine();

        $this->addH2('Properties');
        foreach ($trait->getProperties() as $property) {
            $this->addProperty($property);
        }

        $this->addH2('Methods');
        /* Render methods of a trait */
        foreach ($trait->getMethods() as $method) {
            $docBlock = $method->getDocBlock();
            $params = [];
            if($docBlock !== null) {
                /** @var Param $param */
                foreach ($docBlock->getTagsByName('param') as $param) {
                    $params[$param->getVariableName()] = $param;
                }
            }
            $args = '';
            /** @var Argument $argument */
            foreach ($method->getArguments() as $argument) {
                // TODO: defaults, types
                $args .=  ' $' . $argument->getName() . ', ';
            }
            $args = substr($args, 0, -2);

            $modifiers = $method->getVisibility();
            $modifiers .= $method->isAbstract() ? ' abstract' : '';
            $modifiers .= $method->isFinal() ? ' final' : '';
            $modifiers .= $method->isStatic() ? ' static' : '';
            $this->addLine('.. rst-class:: ' . $modifiers)->addLine();
            $this->indent();
            $this->beginPhpDomain('method', $method->getName().'('.$args.')');
            if ($docBlock)
                $this->addMultiline($docBlock->getDescription());
            $this->addLine();
            if (!empty($params)) {
                foreach ($method->getArguments() as $argument) {
                    /** @var Param $param */
                    $param = $params[$argument->getName()];
                    if ($param !== null)
                        $this->addMultiline(':param ' . $param->getType() . ' $' . $argument->getName() . ': ' . $param->getDescription(), true);
                }
            }
            $this->endPhpDomain('method');
            $this->unindent();

        }
        $this->endPhpDomain(); //trait
    }

}