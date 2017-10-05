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
use phpDocumentor\Reflection\DocBlock;
use phpDocumentor\Reflection\DocBlock\Tags\Deprecated;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;
use phpDocumentor\Reflection\DocBlock\Tags\See;
use phpDocumentor\Reflection\DocBlock\Tags\Since;
use phpDocumentor\Reflection\DocBlock\Tags\Throws;
use phpDocumentor\Reflection\Element;
use phpDocumentor\Reflection\File;


abstract class Builder extends RstBuilder {

    /** @var File */
    protected $file;

    /** @var Element */
    protected $element;

    /** @var Extension[] */
    protected $extensions = [];

    protected abstract function render();

    public function __construct($file, $element, $extensions) {
        $this->file = $file;
        $this->extensions = $extensions;
        $this->element = $element;
        $this->render();
    }

    /**
     * @return Element that is used to build the rst file
     */
    public function getElement() {
        return $this->element;
    }

    /**
     * @param int $indent Levels to indent
     * @param string $tag Name of the tag to parse
     * @param DocBlock $docBlock
     */
    protected function addDocblockTag($indent, $tag, DocBlock $docBlock) {
        $tags = $docBlock->getTagsByName($tag);
        switch ($tag) {
            case 'return':
                if (sizeof($tags) === 0) continue;
                /** @var Return_ $return */
                $return = $tags[0];
                $this->addIndentMultiline($indent, ':returns: ' . $return->getType() . ' ' . $return->getDescription(), true);
                break;
            case 'throws':
                if (sizeof($tags) === 0) continue;
                /** @var Throws $return */
                $return = $tags[0];
                $this->addIndentMultiline($indent, ':throws: ' . $return->getType() . ' ' . $return->getDescription(), true);
                break;
            case 'since':
                if (sizeof($tags) === 0) continue;
                /** @var Since $return */
                $return = $tags[0];
                $this->addIndentMultiline($indent, ':since: ' . $return->getVersion() . ' ' . $return->getDescription(), true);
                break;
            case 'deprecated':
                if (sizeof($tags) === 0) continue;
                /** @var Deprecated $return */
                $return = $tags[0];
                $this->addIndentMultiline($indent, ':deprecated: ' . $return->getVersion() . ' ' . $return->getDescription(), true);
                break;
            case 'see':
                if (sizeof($tags) === 0) continue;
                /** @var See $return */
                $return = $tags[0];
                $this->addIndentMultiline($indent, ':see: ' . $return->getReference() . ' ' . $return->getDescription(), true);
                break;
            case 'license':
                if (sizeof($tags) === 0) continue;
                /** @var DocBlock\Tags\BaseTag $return */
                $return = $tags[0];
                $this->addIndentMultiline($indent, ':license: ' . $return->getDescription(), true);
                break;
            case 'param':
                // param handling is done by subclasses since it is more that docbook parsing
                break;
            default:
                echo 'Tag handling not defined for: ' . $tag . PHP_EOL;
                break;
        }

    }


}