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

use JuliusHaertl\PHPDocToRst\Extension\Extension;
use phpDocumentor\Reflection\DocBlock\Tags\Param;
use phpDocumentor\Reflection\Php\Interface_;


class InterfaceBuilder extends Builder {

    const SECTION_BEFORE_DESCRIPTION = self::class . '::SECTION_BEFORE_DESCRIPTION';
    const SECTION_AFTER_DESCRIPTION = self::class . '::SECTION_AFTER_DESCRIPTION';

    protected function render() {
        /** @var Interface_ $interface */
        $interface = $this->element;

        $namespace = str_replace('\\' . $interface->getName(), '', $interface->getFqsen());

        $docBlock = $interface->getDocBlock();
        $this->addH1(self::escape($interface->getFqsen()))->addLine();
        if($namespace !== '') {
            $this->addLine('.. php:namespace:: ' . substr($namespace, 1));
        }
        $this->addLine('.. php:interface:: ' . $interface->getName())->addLine();

        $this->callExtensions(self::SECTION_BEFORE_DESCRIPTION);

        if ($docBlock) {
            $this
                ->addIndentMultiline(1, $docBlock->getDescription())
                ->addLine();
        }

        // Add class details
        $parents = '';
        foreach ($interface->getParents() as $parent) {
            $parents .= $this->getLink('interface', $parent) . ' ';
        }
        $this->addFieldList('Parent', $parents);

        $this->callExtensions(self::SECTION_AFTER_DESCRIPTION);

        foreach ($interface->getMethods() as $method) {
            /* Render method */
            $docBlock = $method->getDocBlock();
            $params = [];
            if ($docBlock !== null) {
                /** @var Param $param */
                foreach ($docBlock->getTagsByName('param') as $param) {
                    $params[$param->getVariableName()] = $param;
                }
            }
            $args = '';
            foreach ($method->getArguments() as $argument) {
                $args .= '$' . $argument->getName() . ', ';
            }
            $args = substr($args, 0, -2);
            $modifiers = $method->getVisibility();
            $modifiers .= $method->isAbstract() ? ' abstract' : '';
            $modifiers .= $method->isFinal() ? ' final' : '';
            $modifiers .= $method->isStatic() ? ' static' : '';
            $this->addIndentLine(1, '.. rst-class:: ' . $modifiers)->addLine();

            $this->addIndentLine(2, '.. php:method:: ' . $method->getName() . '(' . $args . ')');
            $this->addLine();
            if ($docBlock) {
                $this->addIndentMultiline(3, RstBuilder::escape($docBlock->getDescription()));
                $this->addLine();
            }

            if (!empty($params)) {
                foreach ($method->getArguments() as $argument) {
                    /** @var Param $param */
                    $param = $params[$argument->getName()];
                    if ($param !== null) $this->addIndentMultiline(3, ':param ' . RstBuilder::escape($param->getType()) . ' $' . $argument->getName() . ': ' . RstBuilder::escape($param->getDescription()), true);
                }
                foreach ($docBlock->getTags() as $tag) {
                    $this->addDocblockTag($tag->getName(), $docBlock);
                }
                $this->addLine();
            }
        }
    }

    /**
     * Render extension custom views before the descriptioj
     */
    private function callExtensions($type) {

        foreach ($this->extensions as $extension) {
            $addition = $extension->render($type, $this);
            $this->addIndentMultiline(1, $addition, true);
            $this->addLine();
        }
    }
}