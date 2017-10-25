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
use phpDocumentor\Reflection\DocBlock\Tags\Param;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;
use phpDocumentor\Reflection\DocBlock\Tags\See;
use phpDocumentor\Reflection\DocBlock\Tags\Since;
use phpDocumentor\Reflection\DocBlock\Tags\Throws;
use phpDocumentor\Reflection\Element;
use phpDocumentor\Reflection\Php\Argument;
use phpDocumentor\Reflection\Php\Class_;
use phpDocumentor\Reflection\Php\Constant;
use phpDocumentor\Reflection\Php\Function_;
use phpDocumentor\Reflection\Php\Interface_;
use phpDocumentor\Reflection\Php\Method;
use phpDocumentor\Reflection\Php\Property;
use phpDocumentor\Reflection\DocBlock\Tags\Deprecated;
use phpDocumentor\Reflection\Php\Trait_;

/**
 * Class to build reStructuredText file with sphinxcontrib-phpdomain syntax
 *
 * @package JuliusHaertl\PHPDocToRst\Builder
 */
class PhpDomainBuilder extends RstBuilder {

    const SECTION_BEFORE_DESCRIPTION = self::class . '::SECTION_BEFORE_DESCRIPTION';
    const SECTION_AFTER_DESCRIPTION = self::class . '::SECTION_AFTER_DESCRIPTION';
    const SECTION_AFTER_TITLE = self::class . '::SECTION_AFTER_TITLE';
    const SECTION_AFTER_INTRODUCTION = self::class . '::SECTION_AFTER_INTRODUCTION';

    use ExtensionBuilder {
        ExtensionBuilder::__construct as private __extensionConstructor;
    }

    public function __construct($extensions) {
        $this->__extensionConstructor($extensions);
        $this->addMultiline('.. role:: php(code)' . PHP_EOL . ':language: php', true);
        $this->addLine();
    }

    /**
     * Strip element name from Fqsen to return the namespace only
     *
     * @param Element $element
     * @return mixed
     */
    public static function getNamespace(Element $element) {
        return substr($element->getFqsen(), 0, strlen($element->getFqsen())-strlen('\\'. $element->getName()));
        //return str_replace('\\' . $element->getName(), '', $element->getFqsen());
    }

    /**
     * Add namespace
     * @param Element $element
     */
    protected function addPageHeader(Element $element) {
        $this->addH1(self::escape($element->getName()))->addLine();
        if (self::getNamespace($element) !== '') {
            $this->beginPhpDomain('namespace', substr(self::getNamespace($element), 1), false);
        }
        if ($element instanceof Class_) {
            $modifiers = $element->isAbstract() ? ' abstract' : '';
            $modifiers = $element->isFinal() ? ' final' : $modifiers;
            if ($modifiers !== '') {
                $this->addLine('.. rst-class:: ' . $modifiers)->addLine();
            }
        }

        $this->callExtensions(self::SECTION_AFTER_TITLE, $element);


        $this->beginPhpDomain($this->getTypeForClass($element), $element->getName(), false);
        $this->addLine();
    }

    private function getTypeForClass($element) {
        switch (get_class($element)) {
            case Class_::class:
                return 'class';
            case Interface_::class:
                return 'interface';
            case Trait_::class:
                return 'trait';
            case Function_::class:
                return 'function';
            case Method::class:
                return 'method';
            default:
                return '';
        }
    }

    protected function addAfterIntroduction($element) {
        $this->callExtensions(self::SECTION_AFTER_INTRODUCTION, $element);
    }


    protected function addConstants($constants) {
        if (count($constants) > 0) {
            $this->addH2('Constants');
            foreach ($constants as $constant) {
                if ($this->shouldRenderElement($constant)) {
                    $this->addConstant($constant);
                }
            }
        }
    }

    /**
     * @param Constant $constant
     */
    private function addConstant(Constant $constant) {
        $this->beginPhpDomain('const', $constant->getName() . ' = ' . self::escape($constant->getValue()));
        $docBlock = $constant->getDocBlock();
        $this->addDocBlockDescription($constant);
        if ($docBlock) {
            foreach ($docBlock->getTags() as $tag) {
                $this->addDocblockTag($tag->getName(), $docBlock);
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
        $modifiers = $property->isStatic() ? '' : ' static' ;
        $this->beginPhpDomain('attr', $property->getVisibility() . $modifiers . ' ' . $property->getName());
        $docBlock = $property->getDocBlock();
        $this->addDocBlockDescription($property);
        if ($docBlock) {
            foreach ($docBlock->getTags() as $tag) {
                $this->addDocblockTag($tag->getName(), $docBlock);
            }
        }
        $this->endPhpDomain();
    }

    /**
     * @param Interface_|Class_ $element
     */
    protected function addParent($element) {
        if ($element instanceof Class_) {
            $parent = $element->getParent();
            if ($parent !== null) {
                $this->addFieldList('Parent', $parent !== null ? $this->getLink('class', $parent) : '');
            }
        }
        if ($element instanceof Interface_) {
            $parents = $element->getParents();
            foreach ($parents as $parent) {
                $this->addFieldList('Parent', $parent !== null ? $this->getLink('interface', $parent) : '');
            }
        }
    }

    /**
     * @param Class_|Trait_ $element
     */
    protected function addUsedTraits($element) {
        $usedTraits = '';
        foreach ($element->getUsedTraits() as $trait) {
            $usedTraits .= $this->getLink('trait', $trait) . ' ';
        }
        if ($usedTraits !== '') {
            $this->addFieldList('Used traits', $usedTraits);
        }
    }

    /**
     * @param $methods
     */
    protected function addMethods($methods) {
        if (count($methods) > 0) {
            $this->addH2('Methods');
            foreach ($methods as $method) {
                $this->addMethod($method);
            }
        }
    }

    private function addMethod(Method $method) {
        if (!$this->shouldRenderElement($method)) {
            return;
        }
        $docBlock = $method->getDocBlock();
        $params = [];
        $deprecated = [];
        if ($docBlock !== null) {
            /** @var Param $param */
            foreach ($docBlock->getTagsByName('param') as $param) {
                $params[$param->getVariableName()] = $param;
            }
            $deprecated = $docBlock->getTagsByName('deprecated');
        }
        $args = '';
        /** @var Argument $argument */
        foreach ($method->getArguments() as $argument) {
            // This will work after https://github.com/phpDocumentor/Reflection/pull/109 is merged
            foreach ($argument->getTypes() as $type) {
                $args .= self::escape($type) . '|';
            }
            $args = substr($args, 0, -1) . ' ';
            if($argument->isVariadic()) {
                $args .= '...';
            }
            if($argument->isByReference()) {
                $args .= '&';
            }
            $args .= '$' . $argument->getName();
            $default = $argument->getDefault();
            if ($default !== null) {
                $default = $default === '' ? '""' : $default;
                $args .= '=' . self::escape($default);
            }
            $args .= ', ';
        }
        $args = substr($args, 0, -2);

        $modifiers = $method->getVisibility();
        $modifiers .= $method->isAbstract() ? ' abstract' : '';
        $modifiers .= $method->isFinal() ? ' final' : '';
        $modifiers .= $method->isStatic() ? ' static' : '';
        $deprecated = count($deprecated) > 0 ? ' deprecated' : '';
        $this->addLine('.. rst-class:: ' . $modifiers . $deprecated)->addLine();
        $this->indent();
        $this->beginPhpDomain('method', $modifiers . ' ' . $method->getName() . '(' . $args . ')');
        $this->addDocBlockDescription($method);
        $this->addLine();
        if (!empty($params)) {
            $parameterDetails = '';
            foreach ($method->getArguments() as $argument) {
                /** @var Param $param */
                $param = $params[$argument->getName()];
                if ($param !== null) {
                    $typString = $param->getType();
                    // Remove first \ to allow references
                    if (0 === strpos($typString, '\\')) {
                        $typString = substr($typString, 1);
                    }
                    $paramItem = '* ';
                    $paramItem .= '**$' . $argument->getName() . '** ';
                    if ($typString !== null) {
                        $paramItem .= '(' . self::typesToRst($typString) . ') ';
                    }
                    $paramItem .= ' ' . $param->getDescription();
                    $parameterDetails .= $paramItem . PHP_EOL;
                }
            }
            $this->addFieldList('Parameters', $parameterDetails);
        }
        if ($docBlock !== null) {
            foreach ($docBlock->getTags() as $tag) {
                $this->addDocblockTag($tag->getName(), $docBlock);
            }
        }
        $this->endPhpDomain('method');
        $this->unindent();
    }

    /**
     * @param $type string
     * @param $fqsen string
     * @return string
     */
    public static function getLink($type, $fqsen, $description='') {
        if($description !== '') {
            return ':php:' . $type . ':`' . RstBuilder::escape($description) . '<' . RstBuilder::escape(substr($fqsen, 1)) . '>`';
        }
        return ':php:' . $type . ':`' . RstBuilder::escape(substr($fqsen, 1)) . '`';
    }

    /**
     * @param $type string
     * @param $name string
     * @param $indent bool Should indent after the section started
     */
    public function beginPhpDomain($type, $name, $indent = true) {
        // FIXME: Add checks if it is properly ended
        $this->addLine('.. php:' . $type . ':: ' . $name)->addLine();
        if ($indent === true) {
            $this->indent();
        }
    }

    /**
     * @param string $type
     * @return $this
     */
    public function endPhpDomain($type = '') {
        $this->unindent();
        $this->addLine();
    }

    /**
     * @param Class_|Interface_|Trait_|Property|Method|Constant $element
     * @return $this
     */
    public function addDocBlockDescription($element) {
        if ($element === null) {
            return $this;
        }
        $docBlock = $element->getDocBlock();
        $this->callExtensions(self::SECTION_BEFORE_DESCRIPTION, $element);
        if ($docBlock !== null && $docBlock->getSummary() !== '') {
            $this->addLine('.. rst-class:: phpdoc-description')->addLine();
            $this->indent();
            $this->addMultilineWithoutRendering(RstBuilder::escape($docBlock->getSummary()))->addLine();
            if ((string)$docBlock->getDescription() !== '') {
                $this->addMultilineWithoutRendering(RstBuilder::escape($docBlock->getDescription()))->addLine();
            }
            $this->unindent();
        }
        $this->callExtensions(self::SECTION_AFTER_DESCRIPTION, $element);
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
                $this->addMultiline(':Returns: ' . self::typesToRst($return->getType()) . ' ' . RstBuilder::escape($return->getDescription()), true);
                break;
            case 'var':
                if (count($tags) === 0) continue;
                /** @var DocBlock\Tags\Var_ $return */
                $return = $tags[0];
                $this->addMultiline(':Type: ' . self::typesToRst($return->getType()) . ' ' . RstBuilder::escape($return->getDescription()), true);
                break;
            case 'throws':
                if (count($tags) === 0) continue;
                /** @var Throws $tag */
                foreach ($tags as $tag) {
                    $this->addMultiline(':Throws: ' . self::typesToRst($tag->getType()) . ' ' . RstBuilder::escape($tag->getDescription()), true);
                }
                break;
            case 'since':
                if (count($tags) === 0) continue;
                /** @var Since $return */
                $return = $tags[0];
                $this->addMultiline(':Since: ' . $return->getVersion() . ' ' . RstBuilder::escape($return->getDescription()), true);
                break;
            case 'deprecated':
                if (count($tags) === 0) continue;
                /** @var Deprecated $return */
                $return = $tags[0];
                $this->addMultiline(':Deprecated: ' . $return->getVersion() . ' ' . RstBuilder::escape($return->getDescription()), true);
                break;
            case 'see':
                if (count($tags) === 0) continue;
                /** @var See $return */
                $return = $tags[0];
                $this->addMultiline(':See: ' . self::typesToRst($return->getReference()) . ' ' . RstBuilder::escape($return->getDescription()), true);
                break;
            case 'license':
                if (count($tags) === 0) continue;
                /** @var DocBlock\Tags\BaseTag $return */
                $return = $tags[0];
                $this->addMultiline(':License: ' . RstBuilder::escape($return->getDescription()), true);
                break;
            case 'param':
                // param handling is done by subclasses since it is more that docbook parsing
                break;
            default:
                //echo 'Tag handling not defined for: ' . $tag . PHP_EOL;
                break;
        }

    }

    /**
     * @param string $typesString
     * @return bool|string
     */
    public static function typesToRst($typesString) {
        // http://docs.phpdoc.org/guides/types.html
        $whitelist = [
            'string', 'int', 'integer', 'float', 'bool', 'boolean', 'array', 'resource', 'null', 'callable',
            'mixed', 'void', 'object', 'false', 'true', 'self', 'static', '$this'
        ];
        $types = explode('|', $typesString);
        $result = '';
        /** @var string $type */
        foreach ($types as $typeFull) {
            $type = str_replace('[]', '', $typeFull);
            if (in_array($type, $whitelist, true)) {
                $result .= $typeFull . ' | ';
                continue;
            }
            if (0 === strpos($type, '\\'))
                $type = substr($type, 1);
            $result .= ':any:`' . RstBuilder::escape($typeFull) . ' <' . RstBuilder::escape($type) . '>` | ';
        }
        return substr($result, 0, -3);
    }

    /**
     * @param Element $element
     * @return bool
     */
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