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
use phpDocumentor\Reflection\Php\Project;

abstract class Extension {

    /** @var Project */
    protected $project;

    public function __construct(Project &$project) {
        $this->project = $project;
    }

    /**
     * Method that will be ran before generating any documentation files
     * This is useful for preparing own data structures
     * to be used in the output documentation
     */
    public function prepare() {

    }

    /**
     * Implement custom rendering functionality here.
     * It will be executed by Builder classes depending on the given type.
     *
     * Currently supported types:
     *
     *  - InterfaceBuilder::SECTION_BEFORE_DESCRIPTION
     *  - InterfaceBuilder::SECTION_AFTER_DESCRIPTION
     *
     * @param string $type
     * @param FileBuilder $builder
     */
    public function render($type, &$builder) {

    }

    /**
     * This method will be called to check if a certain element should
     * be rendered in the documentation.
     *
     * An example extension that makes use of it is PublicOnlyExtension
     *
     * @param Element $element
     * @return bool
     */
    public function shouldRenderElement(Element $element) {
        return true;
    }

}