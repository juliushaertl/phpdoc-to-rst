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
use phpDocumentor\Reflection\DocBlock\Tags\Return_;
use phpDocumentor\Reflection\DocBlock\Tags\See;
use phpDocumentor\Reflection\DocBlock\Tags\Since;
use phpDocumentor\Reflection\DocBlock\Tags\Throws;
use phpDocumentor\Reflection\Element;
use phpDocumentor\Reflection\Php\Constant;
use phpDocumentor\Reflection\Php\Property;
use phpDocumentor\Reflection\DocBlock\Tags\Deprecated;

/**
 * Class to build reStructuredText file with sphinxcontrib-phpdomain syntax
 *
 * @package JuliusHaertl\PHPDocToRst\Builder
 */
class PhpDomainBuilder extends RstBuilder {

    private $extensions;

    public function __construct($extensions) {
        $this->extensions = $extensions;
    }

    /**
     * @param Constant $constant
     */
    protected function addConstant(Constant $constant) {
        $this->beginPhpDomain('const', $constant->getName() . ' = ' . $constant->getValue());
        $docBlock = $constant->getDocBlock();
        if ($docBlock) {
            foreach ($docBlock->getTags() as $tag) {
                $this->addDocblockTag( $tag->getName(), $docBlock);
            }
        }
        $this->endPhpDomain();
    }

    /**
     * @param Property[] $properties
     */
    protected function addProperties($properties) {
        if (count($properties) > 0) {
            $this->addH2('Properties');
            foreach ($properties as $property) {
                if ($this->shouldRenderElement($property)) {
                    $this->addProperty($property);
                }
            }
        }
    }

    /**
     * @param Property $property
     */
    private function addProperty(Property $property) {
        $this->beginPhpDomain('attr', $property->getName());
        $this->endPhpDomain();
    }

    /**
     * @param $type string
     * @param $fqsen string
     * @return string
     */
    public function getLink($type, $fqsen) {
        return ':php:' . $type . ':`' . RstBuilder::escape(substr($fqsen, 1)) . '`';
    }

    /**
     * @param $type string
     * @param $name string
     * @param $indent bool Should indent after the section started
     */
    public function beginPhpDomain($type, $name, $indent=true) {
        // FIXME: Add checks if it is properly ended
        $this->addLine('.. php:' . $type . ':: '. $name)->addLine();
        if ($indent === true) {
            $this->indent();
        }
    }

    /**
     * @param string $type
     */
    public function endPhpDomain($type='') {
        $this->unindent();
        $this->addLine();
    }

    /**
     * @param DocBlock $docBlock
     * @return $this
     */
    public function addDocBlockDescription($docBlock) {
        if ($docBlock === null) {
            return $this;
        }
        $this->addMultiline($docBlock->getSummary())->addLine();
        $this->addMultiline($docBlock->getDescription())->addLine();
        return $this;
    }

    /**
     * @param string $tagName Name of the tag to parse
     * @param DocBlock $docBlock
     */
    protected function addDocblockTag($tagName, DocBlock $docBlock) {
        $tags = $docBlock->getTagsByName($tagName);
        switch ($tagName) {
            case 'return':
                if (count($tags) === 0) continue;
                /** @var Return_ $return */
                $return = $tags[0];
                $this->addMultiline(':returns: ' . $return->getType() . ' ' . RstBuilder::escape($return->getDescription()), true);
                break;
            case 'throws':
                if (count($tags) === 0) continue;
                /** @var Throws $tag */
                foreach ($tags as $tag) {
                    $this->addMultiline(':throws: ' . $tag->getType() . ' ' . RstBuilder::escape($tag->getDescription()), true);
                }
                break;
            case 'since':
                if (count($tags) === 0) continue;
                /** @var Since $return */
                $return = $tags[0];
                $this->addMultiline(':since: ' . $return->getVersion() . ' ' . RstBuilder::escape($return->getDescription()), true);
                break;
            case 'deprecated':
                if (count($tags) === 0) continue;
                /** @var Deprecated $return */
                $return = $tags[0];
                $this->addMultiline(':deprecated: ' . $return->getVersion() . ' ' . RstBuilder::escape($return->getDescription()), true);
                break;
            case 'see':
                if (count($tags) === 0) continue;
                /** @var See $return */
                $return = $tags[0];
                $this->addMultiline(':see: ' . $return->getReference() . ' ' . RstBuilder::escape($return->getDescription()), true);
                break;
            case 'license':
                if (count($tags) === 0) continue;
                /** @var DocBlock\Tags\BaseTag $return */
                $return = $tags[0];
                $this->addMultiline(':license: ' . RstBuilder::escape($return->getDescription()), true);
                break;
            case 'param':
                // param handling is done by subclasses since it is more that docbook parsing
                break;
            default:
                //echo 'Tag handling not defined for: ' . $tag . PHP_EOL;
                break;
        }

    }

    public function shouldRenderElement(Element $element) {
        /** @var Extension $extension */
        foreach ($this->extensions as $extension) {
            if ($extension->shouldRenderElement($element) === false) {
                return false;
            }
        }
        return true;
    }

}