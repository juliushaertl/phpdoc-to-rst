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


use phpDocumentor\Reflection\Php\Class_;
use phpDocumentor\Reflection\Php\Namespace_;

/**
 * This class builds a list of all available namespaces in the project.
 *
 * @package JuliusHaertl\PHPDocToRst\Builder
 */
class MainIndexBuilder extends RstBuilder {

    /** @var Namespace_[] */
    private $namespaces;

    public function __construct($namespaces) {
        $this->namespaces = $namespaces;
    }

    public function render() {
        $label = 'root-namespace';
        $this->addLine('.. _namespaces:')->addLine();
        $this->addH1(RstBuilder::escape('Namespaces'));

        $this->addLine('.. toctree::');
        $this->indent();
        $this->addLine(':maxdepth: 1')->addLine();
        foreach ($this->namespaces as $namespace) {
            $namespaceString = (string)$namespace->getFqsen();
            $subPath = $namespaceString;
            $path = substr(str_replace("\\", "/", $subPath), 1) . '/index';
            if ($namespaceString === '\\') {
                $path = 'index';
            }
            $this->addLine($namespace->getFqsen() . ' <' . $path . '>');
        }
        $this->addLine();
        $this->addLine();

    }
}