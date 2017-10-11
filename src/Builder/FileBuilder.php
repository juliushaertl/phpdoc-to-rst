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
use phpDocumentor\Reflection\Element;
use phpDocumentor\Reflection\File;

/**
 * Abstract building class to build sphinxcontrib-phpdomain from a php file
 *
 * @package JuliusHaertl\PHPDocToRst\Builder
 */
abstract class FileBuilder extends PhpDomainBuilder {

    /** @var File */
    protected $file;

    /** @var Element */
    protected $element;

    /** @var Extension[] */
    protected $extensions = [];

    private $phpDomains = [];

    protected abstract function render();

    public function __construct($file, $element, $extensions) {
        parent::__construct($extensions);
        $this->file = $file;
        $this->element = $element;
        $this->render();
    }

    /**
     * @return Element that is used to build the rst file
     */
    public function getElement() {
        return $this->element;
    }

}