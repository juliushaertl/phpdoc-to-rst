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
        //echo ' rendering interface: ' . $interface->getFqsen() . PHP_EOL;

        $docBlock = $interface->getDocBlock();
        $this
            ->addH1($interface->getFqsen())
            ->addLine()
            ->addLine('.. php:interface:: ' . $interface->getName())
            ->addLine()
            ->addIndentLine(1, $interface->getName() . ' interface')
            ->addLine();

        $this->addIndentLine(1, $this->file->path() . ' ' . $interface->getLocation()->getLineNumber());


        /**
         * Render extension custom views before the description
         * @var Extension $extension
         */
        foreach ($this->extensions as $extension) {
            $addition = $extension->render(self::SECTION_BEFORE_DESCRIPTION, $this);
            $this->addIndentMultiline(1, $addition, true);
            $this->addLine();
        }

        if ($docBlock) {
            $this
                ->addIndentMultiline(1, $docBlock->getDescription())
                ->addLine();
        }

        /**
         * Render extension custom views after the description
         * @var Extension $extension
         */
        foreach ($this->extensions as $extension) {
            $addition = $extension->render(self::SECTION_AFTER_DESCRIPTION, $this);
            $this->addIndentMultiline(1, $addition, true);
            $this->addLine();
        }

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
            $this->addIndentLine(1, '.. php:method:: ' . $method->getVisibility() . ' ' . $method->getName() . '(' . $args . ')');
            $this->addLine();
            if ($docBlock) {
                $this->addIndentMultiline(2, $docBlock->getDescription());
                $this->addLine();
            }
            // TODO: move line mention to extension
            $this->addIndentLine(1, $this->file->path() . ' ' . $method->getLocation()->getLineNumber())->addLine();

            if (!empty($params)) {
                foreach ($method->getArguments() as $argument) {
                    /** @var Param $param */
                    $param = $params[$argument->getName()];
                    if ($param !== null) $this->addIndentMultiline(2, ':param ' . $param->getType() . ' $' . $argument->getName() . ': ' . $param->getDescription(), true);
                }
                foreach ($docBlock->getTags() as $tag) {
                    $this->addDocblockTag(2, $tag->getName(), $docBlock);
                }
                $this->addLine();
            }
        }
    }
}