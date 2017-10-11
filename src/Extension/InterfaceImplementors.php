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

use JuliusHaertl\PHPDocToRst\Builder\Builder;
use JuliusHaertl\PHPDocToRst\Builder\InterfaceBuilder;
use JuliusHaertl\PHPDocToRst\Builder\RstBuilder;
use phpDocumentor\Reflection\Php\Interface_;

/**
 * Class InterfaceImplementors
 * @package JuliusHaertl\PHPDocToRst\Extension
 *
 * This extension parses all classes and interface relations.
 * A link to all classes implementing a specific interface
 * is added to the interface documentation.
 */

class InterfaceImplementors extends Extension {

    private $implementors = [];

    public function prepare() {
        foreach ($this->project->getFiles() as $file) {
            foreach ($file->getClasses() as $class) {
                foreach ($class->getInterfaces() as $interface) {
                    if (!array_key_exists((string)$interface, $this->implementors)) {
                        $this->implementors[(string)$interface] = [];
                    }
                    $this->implementors[(string)$interface][] = $class->getFqsen();
                }
            }
        }
    }

    /**
     * @param string $type
     * @param Builder $builder
     */
    public function render($type, &$builder) {
        if ($type === InterfaceBuilder::SECTION_AFTER_DESCRIPTION) {
            /** @var Interface_ $interface */
            $interface = $builder->getElement();
            $content = '';
            foreach ($this->implementors[(string)$interface->getFqsen()] as $implementor) {
                $content .= ':php:class:`' . RstBuilder::escape(substr($implementor, 1)) . '` ';
            }
            $builder->addFieldList('Implemented by', $content);
            $builder->addLine();
        }
    }

}