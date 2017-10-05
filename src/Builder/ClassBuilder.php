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
use phpDocumentor\Reflection\Php\Interface_;

class ClassBuilder extends Builder {

    protected function render() {
        /** @var Interface_ $interface */
        $interface = $this->element;

        $docBlock = $interface->getDocBlock();

        $this
            //->adddLine('.. php:namespace:: '. )
            ->addH1($interface->getFqsen())
            ->addLine()
            ->addLine('.. php:class:: ' . $interface->getName())
            ->addLine()
            ->addIndentLine(1,$interface->getName() . ' class')
            ->addLine();
        if ($docBlock) {
            $this
                ->addIndentMultiline(1, $docBlock->getDescription())
                ->addLine();
        }

        /* Render methods of a class */
        foreach ($interface->getMethods() as $method) {
            $docBlock = $method->getDocBlock();
            $params = [];
            if($docBlock !== null) {
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
            $this->addIndentLine(1, '.. php:method:: '.$method->getName().'('.$args.')');
            $this->addLine();
            if ($docBlock)
                $this->addIndentMultiline(2, $docBlock->getDescription());
            $this->addLine();

            if (!empty($params)) {
                foreach ($method->getArguments() as $argument) {
                    /** @var Param $param */
                    $param = $params[$argument->getName()];
                    if ($param !== null)
                        $this->addIndentMultiline(2, ':param ' . $param->getType() . ' $' . $argument->getName() . ' ' . $param->getDescription());
                }
            }

            $this->addLine();
            $this->addLine();
            //IDEA add implemented by -> link to classes that implement that interface
        }
    }

}