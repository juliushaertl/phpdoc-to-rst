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
use phpDocumentor\Reflection\Php\Constant;
use phpDocumentor\Reflection\Php\Interface_;
use phpDocumentor\Reflection\Php\Property;
use phpDocumentor\Reflection\Php\Visibility;

class ClassBuilder extends Builder {

    protected function render() {
        /** @var Class_ $class */
        $class = $this->element;

        $docBlock = $class->getDocBlock();

        $this->addH1(self::escape($class->getFqsen()));

        $namespace = str_replace('\\' . $class->getName(), '', $class->getFqsen());
        if($namespace !== '') {
            $this->beginPhpDomain('namespace', substr($namespace, 1), false);
        }
        $modifiers = $class->isAbstract() ? ' abstract' : '';
        $modifiers = $class->isFinal() ? ' final' : $modifiers;
        if ($modifiers !== '') {
            $this->addLine('.. rst-class:: ' . $modifiers)->addLine();
        }
        $this->beginPhpDomain('class', $class->getName(), false);

        if ($docBlock) {
            $this
                ->addIndentMultiline(1, $docBlock->getDescription())
                ->addLine();
        }

        // Add class details
        $parent = $class->getParent();
        $this->addFieldList('Parent', $parent !== null ? $this->getLink('class', $parent) : '');

        $implementedInterfaces = '';
        foreach ($class->getInterfaces() as $int) {
            $implementedInterfaces .= $this->getLink('interface', $int) . ' ';
        }

        $this->addFieldList('Interfaces', $implementedInterfaces);
        $usedTraits = '';
        foreach ($class->getUsedTraits() as $trait) {
            $usedTraits .= $this->getLink('trait', $trait) . ' ';
        }
        $this->addFieldList('Traits', $usedTraits);

        $this->addLine();
        $this->addLine();

        // Add class constants
        $this->addH2('Constants');
        /** @var Constant $constant */
        foreach ($class->getConstants() as $constant) {
            $this->beginPhpDomain('const', $constant->getName() . ' = ' . $constant->getValue());
            $docBlock = $constant->getDocBlock();
            if ($docBlock) {
                foreach ($docBlock->getTags() as $tag) {
                    $this->addDocblockTag( $tag->getName(), $docBlock);
                }
            }
            $this->endPhpDomain();
        }

        $this->addH2('Properties');
        /** @var Property $property */
        foreach ($class->getProperties() as $property) {
            $this->beginPhpDomain('attr', $property->getName());
            $this->endPhpDomain();
        }

        $this->addH2('Methods');
        /* Render methods of a class */
        foreach ($class->getMethods() as $method) {
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
                if(!empty($argument->getDefault())) {
                    echo 'ad';
                }
                $args .=  ' $' . $argument->getName() . ', ';
            }
            $args = substr($args, 0, -2);

            $modifiers = $method->getVisibility();
            $modifiers .= $method->isAbstract() ? ' abstract' : '';
            $modifiers .= $method->isFinal() ? ' final' : '';
            $modifiers .= $method->isStatic() ? ' static' : '';
            $this->addIndentLine(1, '.. rst-class:: ' . $modifiers)->addLine();
            $this->addIndentLine(2, '.. php:method:: '.$method->getName().'('.$args.')');
            $this->addLine();
            if ($docBlock)
                $this->addIndentMultiline(3, $docBlock->getDescription());
            $this->addLine();

            if (!empty($params)) {
                foreach ($method->getArguments() as $argument) {
                    /** @var Param $param */
                    $param = $params[$argument->getName()];
                    if ($param !== null)
                        $this->addIndentMultiline(3, ':param ' . $param->getType() . ' $' . $argument->getName() . ': ' . $param->getDescription());
                }
            }

            $this->endPhpDomain(); //class
        }
    }

}